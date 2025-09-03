<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
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

Route::post('/login', [AuthController::class, 'login'])->name('login'); // авторизація та отримання API-токена

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/posts/store', [ArticlesController::class, 'store']);
    Route::patch('/posts/update/{id}', [ArticlesController::class, 'update']);
    Route::delete('/posts/destroy/{id}', [ArticlesController::class, 'destroy']);
});
// докладна інформація про статтю.
Route::get('/posts/search', [ArticlesController::class, 'search']);

// додати коментар
Route::post('/posts/{id}/comments', [CommentsController::class, 'store'])->middleware('throttle:10,1');

// докладна інформація про статтю.
Route::get('/posts/{id}', [ArticlesController::class, 'show']);

// список статей
Route::get('/posts', [ArticlesController::class, 'index']);

