<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.dashboard.iklan');
    }

    public function upload_video_news(Request $request){
        return view('pages.dashboard.video_news');
    }
    public function upload_video_news_post(Request $request){

        // $path = $request->file('file')->store('s3');
        // $url = Storage::disk('s3')->url($path);

        $file = $request->file('file');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('s3')->put($filename, file_get_contents($file), 'public');

        // Simpan informasi file ke database
        $file = new Video();
        $file->filename = $request->file('file')->getClientOriginalName();
        $file->url = Storage::disk('s3')->url($filename);
        $file->save();

        return back()->with('success', 'File uploaded successfully')->with('file_id', $file->id);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // // Validasi khusus berdasarkan kategori
        // $validator->sometimes('kiri', 'required|image|mimes:jpeg,png,jpg,gif|max:2048', function ($input) {
        //     return $input->category === 'kiri';
        // });

        // $validator->sometimes('kanan', 'required|image|mimes:jpeg,png,jpg,gif|max:2048', function ($input) {
        //     return $input->category === 'kanan';
        // });

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $file = $request->file('gambar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('s3')->put($filename, file_get_contents($file), 'public');

            $uploadedFile = [
                'name' => $filename,
                'url' => Storage::disk('s3')->url($filename),
            ];
            $news_data = Iklan::create([
                'image_name' => $uploadedFile['name'],
                'image_url' => $uploadedFile['url'],
                'category_name' => $request->category
            ]);

            DB::commit();

            return response()->json([
                'error_code' => 200,
                'success' => true,
                'message' => 'Files uploaded successfully',
                'data' => $news_data,
                'uploadedFiles' => $uploadedFile
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

    public function store_video(Request $request)
    {

        // $path = $request->file('file')->store('s3');
        // $url = Storage::disk('s3')->url($path);

        $file = $request->file('file');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('s3')->put($filename, file_get_contents($file), 'public');

        // Simpan informasi file ke database
        $file = new Video();
        $file->filename = $request->file('file')->getClientOriginalName();
        $file->url = Storage::disk('s3')->url($filename);
        $file->save();

        return back()->with('success', 'File uploaded successfully')->with('file_id', $file->id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Iklan $iklan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iklan $iklan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iklan $iklan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iklan $iklan)
    {
        //
    }
}
