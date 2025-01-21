<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Berita;
use App\Models\Iklan;
use App\Models\News as ModelsNews;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class News extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categoryBerita = 'Berita';
        $categoryAcara = 'Acara';
        $categoryRilis = 'Rilis';
        $categoryUmum = 'Umum';
        $categoryAdvertorial = 'Advertorial';

        $category =  \App\Models\Category::where('name', $categoryBerita)->first();

        $Berita = ModelsNews::whereHas('Category', function ($query) use ($categoryBerita) {
            $query->where('name', $categoryBerita);
        })->orderBy('created_at', 'desc')->get();

        $Acara = ModelsNews::whereHas('Category', function ($query) use ($categoryAcara) {
            $query->where('name', $categoryAcara);
        })->orderBy('created_at', 'desc')->get();

        $Rilis = ModelsNews::whereHas('Category', function ($query) use ($categoryRilis) {
            $query->where('name', $categoryRilis);
        })->orderBy('created_at', 'desc')->get();

        $Umum = ModelsNews::whereHas('Category', function ($query) use ($categoryUmum) {
            $query->where('name', $categoryUmum);
        })->orderBy('created_at', 'desc')->get();

        $Advertorial = ModelsNews::whereHas('Category', function ($query) use ($categoryAdvertorial) {
            $query->where('name', $categoryAdvertorial);
        })->orderBy('created_at', 'desc')->get();


        // iklan
        $kiri = Iklan::where('category_name', 'kiri')->limit(4)->get();
        $kanan = Iklan::where('category_name', 'kanan')->latest()->first();
        $adv = Iklan::all();
        $video = Video::take(1)->first();
        return view('templates.index', compact('Berita', 'Acara', 'Rilis', 'Umum', 'kiri', 'kanan', 'video', 'adv', 'Advertorial'));
    }
    public function dashboard()
    {
        $categories = Category::get();
        // return view('dashboard', compact('category'));
        return view('templates.layouts', compact('categories'));
    }

    public function dashboards()
    {

        $categoryBerita = 'Berita';
        $categoryAcara = 'Acara';
        $categoryRilis = 'Rilis';
        $categoryUmum = 'Umum';
        $categoryAdvertorial = 'Advertorial';


        // Get news items for each category
        $Berita = ModelsNews::whereHas('Category', function ($query) use ($categoryBerita) {
            $query->where('name', $categoryBerita);
        })->orderBy('created_at', 'desc')->get();

        $Acara = ModelsNews::whereHas('Category', function ($query) use ($categoryAcara) {
            $query->where('name', $categoryAcara);
        })->orderBy('created_at', 'desc')->get();

        $Rilis = ModelsNews::whereHas('Category', function ($query) use ($categoryRilis) {
            $query->where('name', $categoryRilis);
        })->orderBy('created_at', 'desc')->get();

        $Umum = ModelsNews::whereHas('Category', function ($query) use ($categoryUmum) {
            $query->where('name', $categoryUmum);
        })->orderBy('created_at', 'desc')->get();
        $Advertorial = ModelsNews::whereHas('Category', function ($query) use ($categoryAdvertorial) {
            $query->where('name', $categoryAdvertorial);
        })->orderBy('created_at', 'desc')->get();

        // Calculate totals
        $totalBerita = $Berita->count();
        $totalAcara = $Acara->count();
        $totalRilis = $Rilis->count();

        // iklan
        $kiri = Iklan::where('category_name', 'kiri')->limit(4)->get();
        $kanan = Iklan::where('category_name', 'kanan')->limit(4)->get();

        return view('pages.dashboard.dashboards', compact('Berita', 'Acara', 'Rilis', 'Umum', 'totalBerita', 'totalAcara', 'totalRilis', 'kiri', 'kanan', 'Advertorial'));
    }
    public function index_berita()
    {
        // dd(Auth::user()->hasRole('admin'));

        // return view('dashboard', compact('category'));
        return view('pages.dashboard.index_berita');
    }
    public function get_berita(Request $request)
    {
        if ($request->ajax()) {
            // Ambil role pengguna saat ini
            $user = Auth::user();
            $role = $user->getRoleNames()->first(); // Ambil role pertama pengguna

            if ($role === 'admin') {
                // Jika pengguna adalah admin, ambil seluruh data
                $data = ModelsNews::latest()->get();
            } else {
                // Jika bukan admin, ambil hanya data yang dibuat oleh pengguna
                $data = ModelsNews::where('author_id', $user->uuid)->latest()->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-id="' . $row->id . '">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function input_berita()
    {
        // Ambil role pengguna saat ini
        $role = Auth::user()->getRoleNames()->first();
        // dd($role);

        // Filter kategori berdasarkan role pengguna
        $categories = Category::when(in_array($role, ['Wartawan', 'Narasumber', 'Umum', 'Jasa', 'Humas']), function ($query) {
            return $query->whereIn('name', ['Acara', 'Berita']); // Kategori yang ditampilkan untuk role user
        })
            ->when($role === 'admin', function ($query) {
                return $query->whereIn('name', ['Rilis', 'berita']); // Tampilkan kategori 'rilis' dan 'berita' untuk admin
            })
            ->get();

        // Transformasi kategori untuk admin
        if ($role === 'admin') {
            $categories = $categories->map(function ($category) {
                if ($category->name === 'Rilis') {
                    $category->name = 'Berita';
                } elseif ($category->name === 'Berita') {
                    $category->name = 'Headline';
                }
                return $category;
            });
        }

        return view('pages.dashboard.input_berita', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'category' => 'required',
            'content' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // dd($request);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        DB::beginTransaction();

        try {
            // Ambil file dari request
            $file = $request->file('gambar');
            if (!$file) {
                throw new \Exception('No file uploaded');
            }

            // Generate nama file unik
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Upload file ke S3
            $uploadSuccess = Storage::disk('s3')->put($filename, file_get_contents($file), 'public');
            if (!$uploadSuccess) {
                throw new \Exception('Failed to upload file to S3');
            }

            // Simpan informasi file
            $uploadedFile = [
                'name' => $filename,
                'url' => Storage::disk('s3')->url($filename),
            ];

            // Ambil data author
            $author = Auth::user();

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

            // Commit transaksi jika semua berhasil
            DB::commit();

            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Files uploaded successfully',
                'data' => $news_data,
                'uploadedFiles' => $uploadedFile
            ], 201);
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return response()->json([
                'error_code' => 500,
                'success' => false,
                'message' => 'Error uploading files',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ModelsNews::where('slug', $id)->first();
        // Check if the news item is found
        if (!$data) {
            // Handle the case where the news is not found
            return redirect()->back()->with('error', 'News not found');
        }
        // Calculate the reading time
        $readingTime = $data->readingTime();
        $jumlahBerita = \App\Models\News::selectRaw('categories.name as category_name, count(*) as total')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();
        $beritaTerbaru = \App\Models\News::orderBy('published_at', 'desc')
            ->first()
            ->take(3)  // Ambil 10 berita terbaru, sesuaikan sesuai kebutuhan
            ->get();
        $acaraTerbaru = \App\Models\News::orderBy('published_at', 'desc')
            ->take(3)  // Ambil 10 berita terbaru, sesuaikan sesuai kebutuhan
            ->get();
        $categoryBerita = 'Berita';
        $Berita = ModelsNews::whereHas('Category', function ($query) use ($categoryBerita) {
            $query->where('name', $categoryBerita);
        })->get();

        $beritaTerbaru = ModelsNews::orderBy('published_at', 'desc')->take(3)->get();
        return view('pages.index', compact('data', 'readingTime', 'jumlahBerita', 'beritaTerbaru', 'Berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $news = ModelsNews::findOrFail($id);
        $categories = Category::get();

        return view('pages.dashboard.berita_edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'category' => 'required',
            'content' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $news = ModelsNews::findOrFail($id);

            $uploadedFile = [];
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                Storage::disk('s3')->put($filename, file_get_contents($file), 'public');

                $uploadedFile = [
                    'name' => $filename,
                    'url' => Storage::disk('s3')->url($filename),
                ];

                // Remove old image
                // Storage::disk('s3')->delete($news->image_name);
            }

            $news->update([
                'title' => $request->judul_berita,
                'slug' => Str::slug($request->judul_berita),
                'content' => $request->content,
                'image_name' => $uploadedFile['name'] ?? $news->image_name,
                'image_url' => $uploadedFile['url'] ?? $news->image_url,
                'category_id' => $request->category
            ]);

            DB::commit();

            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'News updated successfully',
                'data' => $news,
                'uploadedFile' => $uploadedFile
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error_code' => 500,
                'success' => false,
                'message' => 'Error updating news',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $news = ModelsNews::find($id);
        if ($news) {
            $news->delete();
            return response()->json(['success' => 'Berita berhasil dihapus ' . $news->title]);
        }
        return response()->json(['error' => 'Berita tidak ditemukan'], 404);
    }
}