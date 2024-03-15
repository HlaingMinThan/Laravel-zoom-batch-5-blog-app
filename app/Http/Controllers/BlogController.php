<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::filter(request(['search', 'username', 'category']))
            ->paginate(3)
            ->withQueryString();

        $categories = Category::all();

        $title = "My Blog Project";
        return view('home', [
            'blogs' => $blogs,
            'categories' => $categories,
            'title' => $title
        ]);
    }

    public function show(Blog $blog)
    {
        $comments = $blog->comments()->latest()->paginate(5);
        return view('blog-detail', [
            'blog' =>  $blog,
            'comments' =>  $comments,
        ]);
    }
}
