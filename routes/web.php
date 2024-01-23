<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    $blogs = Blog::latest()->get();
    $title = "My Blog Project";
    return view('home', [
        'blogs' => $blogs,
        'title' => $title
    ]);
});

Route::get('/about', function () {

    return view('about');
});
Route::get('/about-us', function () {
    return redirect('/about');
});

//Route model binding
Route::get('/blogs/{blog:slug}', function (Blog $blog) { //Blog::find($id)
    return view('blog-detail', [
        'blog' =>  $blog
    ]);
});
