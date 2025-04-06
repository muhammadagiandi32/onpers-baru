<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatController as Chat;
use App\Http\Controllers\API\NewsControllers as Newss;
use App\Models\Category;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login']);
Route::post('/auth/google', [AuthController::class, 'googleLogin']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()->only([
                'uuid',
                'name',
                'email',
                'role',
                'media'
            ]),
        ]);
    });
    Route::get('/get-users', [Newss::class, 'getUsers']);

});

Route::get('/news', [Newss::class, 'index']);
Route::get('/news-details/{id}', [Newss::class, 'show'])->name('news-details');
Route::post('/post-berita', [Newss::class, 'storeMobile'])->name('news.storeMobile')->middleware('auth:sanctum');
Route::post('/update-berita/{id}', [Newss::class, 'updateMobile'])->name('news.updateMobile')->middleware('auth:sanctum');
Route::post('/list-by-author', [Newss::class, 'searchByAuthor'])->name('news.searchByAuthor')->middleware('auth:sanctum');



Route::get('/messages', [Chat::class, 'getAllUsers'])->middleware('auth:sanctum');
Route::post('/messages/post', [Chat::class, 'postMessages']);
Route::get('/messages/{sender}/{receiver}', [Chat::class, 'fetchMessagesBetween']);

/**
 * Api for Breaking Newss
 * and list news by category
 */
Route::get('/breaking-news', [Newss::class, 'breakingNews']);
Route::get('/news/category', [Newss::class, 'newsByCategory']);
Route::get('/news/search', [Newss::class, 'searchByName']);
Route::get('/category-name', function () {
    $category = Category::get();
    return response()->json([
        'error_code' => 200,
        'success' => true,
        'message' => 'List Category',
        'data' => $category,
    ]);
});
