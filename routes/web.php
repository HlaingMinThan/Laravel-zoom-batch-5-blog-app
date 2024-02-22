<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustBeGuestUser;
use App\Http\Middleware\MustBeLoginUser;
use Illuminate\Support\Facades\Route;

//login
Route::middleware(MustBeLoginUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
    Route::get('/categories/{category:id}', [CategoryController::class, 'index']);
    Route::get('/authors/{user:username}', [UserController::class, 'index']);
    Route::post('/blogs/{blog}/comments/store', [CommentController::class, 'store']);
});

//not login
Route::middleware(MustBeGuestUser::class)->group(function () {
    Route::get('/login', [LogInController::class, 'create']);
    Route::post('/login', [LogInController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/about-us', function () {
    return redirect('/about');
});
