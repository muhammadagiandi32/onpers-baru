<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\News;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\API\AuthController;
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

Route::get('/privacy', function () {
    return view('templates.contoh');
});

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/', [News::class, 'index']);
Route::get('/news-details/{id}', [News::class, 'show'])->name('news-details');
Route::get('/event-details/{id}', [News::class, 'event'])->name('event-details');

Route::get('/dashboard', [News::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//dashboard
Route::get('/dashboards', [News::class, 'dashboards'])->middleware(['auth', 'verified'])->name('dashboards');


// public
Route::get('/add-news', [News::class, 'form_news'])->middleware(['auth', 'verified'])->name('add-news');

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
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/upload-video-news', [IklanController::class, 'upload_video_news'])->name('iklan.video');
    Route::post('/upload-video-news-post', [IklanController::class, 'upload_video_news_post'])->name('iklan.video_news');



    // chat
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store'); // untuk menyimpan pesan
    Route::get('/chat/fetch-messages', [ChatController::class, 'fetchMessages'])->name('chat.fetch-messages');
    Route::get('/chat/compose', [ChatController::class, 'compose'])->name('chat.compose'); // Rute untuk menyusun pesan
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send'); // Rute untuk mengirim pesan
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    // Route::get('/chat', [MessageController::class, 'index'])->name('chat.index');
    // Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/chat/fetch-messages', [ChatController::class, 'fetchMessages'])->name('chat.fetch-messages');
    //wartawan
    Route::get('/wartawan', [App\Http\Controllers\UserController::class, 'wartawanIndex'])->name('wartawan.index');

    //narasumber
    Route::get('/narasumber', [App\Http\Controllers\UserController::class, 'narasumber'])->name('narasumber.index');
    //humas
    Route::get('/humas', [App\Http\Controllers\UserController::class, 'humasIndex'])->name('humas.index');
    //Jasa
    Route::get('/jasa', [App\Http\Controllers\UserController::class, 'jasaIndex'])->name('jasa.index');
    //umum
    Route::get('/umum', [App\Http\Controllers\UserController::class, 'umumIndex'])->name('umum.index');
    //info
    Route::get('/info', [App\Http\Controllers\UserController::class, 'umumIndex'])->name('info.index');

    Route::get('/get-video-news', [IklanController::class, 'getVideoNews'])->name('iklan.getVideoNews');
    Route::get('/category/{category}', [News::class, 'viewAll'])->name('category.viewAll');

});

require __DIR__ . '/auth.php';
