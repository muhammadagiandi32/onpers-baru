<?php

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

Route::get('/', [News::class, 'index']);
Route::get('/news-details/{id}', [News::class, 'show'])->name('news-details');
Route::get('/dashboard', [News::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/input_berita', [News::class, 'input_berita'])->middleware(['auth', 'verified'])->name('input_berita');

Route::post('/post-berita', [News::class, 'store'])->name('news.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';