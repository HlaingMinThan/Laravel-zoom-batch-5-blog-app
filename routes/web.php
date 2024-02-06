<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/categories/{category:id}', [CategoryController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/about-us', function () {
    return redirect('/about');
});
