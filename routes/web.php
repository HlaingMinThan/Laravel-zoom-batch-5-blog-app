<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'destroy']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/categories/{category:id}', [CategoryController::class, 'index']);
Route::get('/authors/{user:username}', [UserController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/about-us', function () {
    return redirect('/about');
});
