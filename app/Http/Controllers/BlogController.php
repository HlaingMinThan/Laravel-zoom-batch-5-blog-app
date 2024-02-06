<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $blogs = Blog::where('title', 'LIKE', '%' . request('search') . '%')->get();
        } else {
            $blogs = Blog::with('category')->latest()->get();
        }
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
