<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\News as ModelsNews;
use Illuminate\Support\Facades\Log;

class NewsControllers extends Controller
{
    public function index()
    {
        $news = News::with([
            'author' => function ($query) {
                $query->select('uuid', 'name');
            },
            'category' => function ($query) {
                $query->select('id', 'name');
            },
        ])->limit(10)->get();
        foreach ($news as $item) {
            $item->image_signed_url = Storage::disk('s3')->temporaryUrl(
                $item->image_name,
                Carbon::now()->addMinutes(10) // URL valid for 10 minutes
            );
        }

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news',
            'data' => $news,
        ], 200);
    }

    public function breakingNews()
    {
        $news = News::join('categories as c', 'news.category_id', '=', 'c.id')
            ->select('news.*')
            ->orderBy('news.created_at', 'desc')
            ->limit(5)
            ->get();

        foreach ($news as $item) {
            $item->image_signed_url = Storage::disk('s3')->temporaryUrl(
                $item->image_name,
                Carbon::now()->addMinutes(10) // URL valid for 10 minutes
            );
        }

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news',
            'data' => $news,
        ], 200);
    }

    public function newsByCategory(Request $request)
    {
        $categoryName = $request->query('category');
        $viewAll = $request->query('viewAll');

        $query = News::join('categories as c', 'news.category_id', '=', 'c.id')
            ->select('news.*', 'c.name')
            ->orderBy('news.created_at', 'desc')
            ->where('c.name', '=', $categoryName);

        // Jika category bukan "all", tambahkan kondisi where dan limit
        if ($viewAll !== 'y' || $viewAll == null) {
            $query->limit(3);
        }

        $news = $query->get();

        foreach ($news as $item) {
            $item->image_signed_url = Storage::disk('s3')->temporaryUrl(
                $item->image_name,
                Carbon::now()->addMinutes(10) // URL valid for 10 minutes
            );
        }

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news for category: ' . $categoryName,
            'data' => $news,
        ], 200);
    }

    public function newsIklan($name)
    {
        $category = Category::where('name', $name)->first();

        if (!$category) {
            return response()->json([
                'error_code' => 404,
                'success' => false,
                'message' => 'Category not found',
                'data' => []
            ], 404);
        }

        $news = News::with(['author', 'category'])->where('category_id', $category->id)->get();

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news',
            'data' => $news
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => ['required', 'string', 'min:5', 'max:255'],
    //         'content' => ['required', 'string'],
    //         'image' => ['required', 'file', 'mimes:jpeg,jpg,png,gif,webp', 'max:5120'], // Maksimal 5MB
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'error_code' => 422,
    //             'success' => false,
    //             'message' => 'Validation error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     $file = $request->file('image');

    //     Log::info('File to be uploaded:', [
    //         'originalName' => $file->getClientOriginalName(),
    //         'size' => $file->getSize(),
    //         'mimeType' => $file->getMimeType(),
    //     ]);

    //     $author_id = Author::where('user_uuid', Auth::user()->uuid)->first();
    //     if (!$author_id) {
    //         return response()->json([
    //             'error_code' => 404,
    //             'success' => false,
    //             'message' => 'Author not found',
    //         ], 404);
    //     }

    //     $category = Category::first();
    //     if (!$category) {
    //         return response()->json([
    //             'error_code' => 404,
    //             'success' => false,
    //             'message' => 'Category not found',
    //         ], 404);
    //     }

    //     try {
    //         DB::beginTransaction();

    //         $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
    //         $image = Storage::disk('s3')->put($filename, file_get_contents($file));
    //         if (!$image) {
    //             return response()->json([
    //                 'error_code' => 500,
    //                 'success' => false,
    //                 'message' => 'Failed to upload file to S3',
    //             ], 500);
    //         }

    //         $news_data = News::create([
    //             'id' => Str::uuid(),
    //             'title' => $request->title,
    //             'slug' => Str::slug($request->title),
    //             'content' => $request->content,
    //             'image_name' => $filename,
    //             'image_url' => Storage::disk('s3')->url($filename),
    //             'author_id' => $author_id->id,
    //             'category_id' => $category->id,
    //         ]);

    //         DB::commit();
    //         return response()->json([
    //             'error_code' => 200,
    //             'success' => true,
    //             'message' => 'News created successfully',
    //             'data' => $news_data
    //         ], 201);
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return response()->json([
    //             'error_code' => 500,
    //             'success' => false,
    //             'message' => 'An error occurred while creating news',
    //             'error' => $th->getMessage()
    //         ], 500);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        try {
            $news = News::where('slug', $slug)->firstOrFail();
            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Detail berita',
                'data' => $news
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => 404,
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Display the specified resource by UUID.
     */
    public function showByUuid(string $uuid)
    {
        try {
            $news = News::with(['author', 'category'])->findOrFail($uuid);
            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Detail berita',
                'data' => $news
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => 404,
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }
    }

    public function edit($uuid)
    {
        try {
            $news = News::with(['author', 'category'])->findOrFail($uuid);
            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Detail berita',
                'data' => $news
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error_code' => 404,
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $uuid)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 422,
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $news = News::findOrFail($uuid);
        $news->update($request->all());

        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'News updated successfully',
            'data' => $news
        ], 200);
    }

    /**
     * Menghapus post yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $News = News::findOrFail($id);
        $News->delete();

        return response()->json(null, 204);
    }

    public function searchByName(Request $request)
    {
        $search = $request->name;
        $news = News::where('title', 'like', '%' . $search . '%')->get();
        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news',
            'data' => $news
        ]);
    }

    public function storeMobile(Request $request)
    {
        Log::info('storeMobile request initiated.', ['request' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'category' => 'required',
            'content' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:51200',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed.', ['errors' => $validator->errors()]);
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // Ambil file dari request
            Log::info('Attempting to retrieve file.');
            $file = $request->file('gambar');
            if (!$file) {
                throw new \Exception('No file uploaded');
            }

            // Generate nama file unik
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Log::info('Generated unique filename.', ['filename' => $filename]);

            // Upload file ke S3
            $uploadSuccess = Storage::disk('s3')->put($filename, file_get_contents($file), 'public');
            if (!$uploadSuccess) {
                throw new \Exception('Failed to upload file to S3');
            }

            Log::info('File uploaded to S3.', ['filename' => $filename]);

            // Simpan informasi file
            $uploadedFile = [
                'name' => $filename,
                'url' => Storage::disk('s3')->url($filename),
            ];

            // Ambil data author
            $author = Auth::user();
            Log::info('Retrieved author information.', ['author' => $author]);

            // Simpan data berita ke database
            $news_data = ModelsNews::create([
                'id' => Str::uuid(),
                'title' => $request->judul_berita,
                'slug' => Str::slug($request->judul_berita),
                'content' => $request->content,
                'image_name' => $uploadedFile['name'],
                'image_url' => $uploadedFile['url'],
                'author_id' => $author->uuid,
                'category_id' => $request->category
            ]);

            Log::info('News data successfully saved to database.', ['news_data' => $news_data]);

            // Commit transaksi jika semua berhasil
            DB::commit();

            Log::info('Transaction committed successfully.');

            return response()->json([
                'error_code' => 201,
                'success' => true,
                'message' => 'Files uploaded successfully',
                'data' => $news_data,
                'uploadedFiles' => $uploadedFile
            ], 201);
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            Log::error('Error occurred during file upload or database operation.', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ]);

            return response()->json([
                'error_code' => 500,
                'success' => false,
                'message' => 'Error uploading files',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
