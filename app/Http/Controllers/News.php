<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\News as ModelsNews;
use Illuminate\Http\Request;
use App\Models\New;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $category =  \App\Models\Category::where('name', $categoryBerita)->first();

        $Berita = ModelsNews::whereHas('Category', function ($query) use ($categoryBerita) {
            $query->where('name', $categoryBerita);
        })->get();
        $Acara =
            ModelsNews::whereHas('Category', function ($query) use ($categoryAcara) {
                $query->where('name', $categoryAcara);
            })->get();
        $Rilis = ModelsNews::whereHas('Category', function ($query) use ($categoryRilis) {
            $query->where('name', $categoryRilis);
        })->get();

        // dd($Berita);

        // dd($Berita);
        return view('pages.news', compact('Berita', 'Acara', 'Rilis'));
    }
    public function dashboard()
    {
        $category = Category::get();
        // return view('dashboard', compact('category'));
        return view('pages.dashboard', compact('category'));
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
            'judul_berita' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // dd($request);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // $author_id = Author::where('user_uuid', Auth::user()->uuid)->first()->id;

        try {
            DB::beginTransaction();

            $uploadedFiles = [];
            foreach ($request->input('gambar') as $file) {
                $filename = Str::uuid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                Storage::disk('s3')->put($filename, base64_decode($file['data']), 'public');
                $uploadedFiles[] = [
                    'name' => $filename,
                    'url' => Storage::disk('s3')->url($filename),
                ];
            }
            $author = Auth::user();
            // return response()->json($author);
            $news_data = ModelsNews::create([
                'id' => Str::uuid(),
                'title' => $request->judul,
                'slug' => Str::slug($request->judul),
                'content' => $request->description,
                'image_name' => $uploadedFiles[0]['name'],
                'image_url' => $uploadedFiles[0]['url'],
                'author_id' => $author->uuid,
                'category_id' => $request->category
            ]);

            DB::commit();

            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Files uploaded successfully',
                'data' => $news_data,
                'uploadedFiles' => $uploadedFiles
            ], 201);
        } catch (\Throwable $th) {
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

        //
        $data = ModelsNews::where('slug', $id)->first();
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

        return view('pages.news-details', compact('data', 'readingTime', 'jumlahBerita', 'beritaTerbaru', 'acaraTerbaru', 'Rilis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
