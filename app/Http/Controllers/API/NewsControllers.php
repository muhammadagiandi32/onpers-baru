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
        ])->get();
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            // 'slug' => ['required'],
            'content' => ['required'],
            'image' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 400,
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }
        $author_id = Author::where('user_uuid', Auth::user()->uuid)->first();
        // dd();
        try {
            DB::beginTransaction();
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Storage::disk('s3')->put($filename, file_get_contents($file));

            $news_data = News::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'image_name' => $filename,
                'image_url' => Storage::disk('s3')->url($filename),
                'author_id' => $author_id->id,
                'category_id' => Category::first()->id
            ]);
            DB::commit();
            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => $image,
                'data' => $news_data
            ], 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error_code' => 500,
                'success' => false,
                'message' => $image,
                'error' => $th->getMessage()
            ], 500);
        }
    }

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
        // dd($request->all());
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
        // dd($search);
        $news = News::where('title', 'like', '%' . $search . '%')->get();
        // dd($news);
        return response()->json([
            'error_code' => 200,
            'success' => true,
            'message' => 'List data news',
            'data' => $news
        ]);
    }
}
