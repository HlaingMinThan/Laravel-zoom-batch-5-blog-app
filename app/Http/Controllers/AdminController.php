<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = auth()->user()->blogs;
        return view('admin.index', [
            'blogs' => $blogs
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', [
            'categories' => $categories,
        ]);
    }

    public function store()
    {

        request()->validate([
            "title" => ['required', 'min:5', 'max:255'],
            "photo" => ['required', 'image'],
            "slug" => ['required', 'min:5'],
            "intro" => ['required', 'min:5'],
            "body" => ['required', 'min:5'],
        ]);
        $blog = new Blog();
        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->intro = request('intro');
        $blog->body = request('body');
        $blog->category_id = request('category_id');
        $blog->user_id = auth()->id();
        $blog->photo =  '/storage/' . request('photo')->store('/blogs');
        $blog->save();

        return redirect('/admin');
    }

    public function edit(Blog $blog)
    {
        if (auth()->user()->can('edit', $blog)) {
            return view('admin.edit', [
                'blog' => $blog,
                'categories' => Category::all()
            ]);
        } else {
            return redirect('/admin');
        }
    }

    public function update(Blog $blog)
    {

        request()->validate([
            "title" => ['required', 'min:5', 'max:255'],
            "photo" => ['nullable'],
            "slug" => ['required', 'min:5'],
            "intro" => ['required', 'min:5'],
            "body" => ['required', 'min:5'],
        ]);

        $blog->title = request('title');
        $blog->slug = request('slug');
        $blog->intro = request('intro');
        $blog->body = request('body');

        if (request('photo')) {
            $blog->photo =  '/storage/' . request('photo')->store('/blogs');
        }

        $blog->save();

        return redirect('/admin');
    }

    public function delete(Blog $blog)
    {
        $blog->delete();

        return back();
    }
}
