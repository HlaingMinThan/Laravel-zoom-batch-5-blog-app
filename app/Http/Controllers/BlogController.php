<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::filter(request(['search', 'username', 'category']))
            ->paginate(3)
            ->withQueryString();

        $title = "My Blog Project";
        return view('home', [
            'blogs' => $blogs,
            'title' => $title
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog-detail', [
            'blog' =>  $blog
        ]);
    }
}
