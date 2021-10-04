<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Api\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegisterController::class, 'store'])->name('api.v1.register');

//Rutas para categorias
Route::get('categories', [CategoryController::class, 'index'])->name('api.v1.categories.index');
Route::post('categories', [CategoryController::class, 'store'])->name('api.v1.categories.store');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('api.v1.categories.show');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('api.v1.categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('api.v1.categories.delete');

//Rutas para posts
Route::get('posts', [PostController::class, 'index'])->name('api.v1.posts.index');
Route::post('posts', [PostController::class, 'store'])->name('api.v1.posts.store');
Route::get('posts/{post}', [PostController::class, 'show'])->name('api.v1.posts.show');
Route::put('posts/{post}', [PostController::class, 'update'])->name('api.v1.posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('api.v1.posts.delete');

//Rutas para etiquetas
