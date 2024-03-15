<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeGuestUser;
use App\Http\Middleware\MustBeLoginUser;
use Illuminate\Support\Facades\Route;


Route::middleware(MustBeAdminUser::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs/create', [AdminController::class, 'create']);
    Route::delete('/admin/blogs/{blog}/delete', [AdminController::class, 'delete']);
});

//login
Route::middleware(MustBeLoginUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
    Route::post('/blogs/{blog}/subscribe', [SubscriberController::class, 'store']);
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
