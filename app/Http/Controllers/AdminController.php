<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.index', [
            'blogs' => $blogs
        ]);
    }
    public function create()
    {
        return view('admin.create');
    }

    public function delete(Blog $blog)
    {
        $blog->delete();

        return back();
    }
}
