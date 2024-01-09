<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/', function () {
    $blogs = [
        [
            'title' => 'what is react',
            'description' => 'lorem...'
        ],
        [
            'title' => 'what is vuejs',
            'description' => 'lorem...'
        ],
        [
            'title' => 'what is tailwind',
            'description' => 'lorem...'
        ],
    ];
    $title = "My Blog Project";

    return view('home', [
        'blogs' => $blogs,
        'title' => $title
    ]);
});

//localhost:8000/blogs/nay-kg-lar , $filename = 'nay-kg-lar'
Route::get('/blogs/{filename}', function ($filename) {
    return view('blog-detail', [
        'blog' =>  Blog::find($filename)
    ]);
});
