<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatController as Chat;
use App\Http\Controllers\API\NewsControllers as News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });
});

Route::get('/news', [News::class, 'index']);
Route::get('/news-details/{id}', [News::class, 'show'])->name('news-details');

Route::get('/messages', [Chat::class, 'getAllUsers'])->middleware('auth:sanctum');
Route::post('/messages/post', [Chat::class, 'postMessages']);
Route::get('/messages/{sender}/{receiver}', [Chat::class, 'fetchMessagesBetween']);
