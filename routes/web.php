<?php

use App\Http\Controllers\IklanController;
use App\Http\Controllers\News;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/contoh', function () {
    return view('templates.contoh');
});
Route::get('/', [News::class, 'index']);
Route::get('/news-details/{id}', [News::class, 'show'])->name('news-details');
Route::get('/dashboard', [News::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//dashboard
Route::get('/dashboards', [News::class, 'dashboards'])->middleware(['auth', 'verified'])->name('dashboards');




// Berita
Route::get('/berita/input_berita', [News::class, 'input_berita'])->middleware(['auth', 'verified'])->name('input_berita');
Route::get('/berita/index', [News::class, 'index_berita'])->middleware(['auth', 'verified'])->name('index_berita');
Route::get('/berita/get_berita', [News::class, 'get_berita'])->middleware(['auth', 'verified'])->name('get_berita');
Route::get('/berita/{id}/edit', [News::class, 'edit'])->middleware(['auth', 'verified'])->name('berita.edit');
Route::put('/berita/{id}', [News::class, 'update'])->middleware(['auth', 'verified'])->name('news.update');

Route::delete('/berita/{id}', [News::class, 'destroy'])->middleware(['auth', 'verified'])->name('news.destroy');

// Iklan
Route::resource('iklan', IklanController::class);
Route::post('/iklan/input_iklan', [IklanController::class, 'store_video'])->middleware(['auth', 'verified'])->name('video.upload');




Route::post('/post-berita', [News::class, 'store'])->name('news.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';