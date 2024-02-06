<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('home', [
            'blogs' => $category->blogs()->with('category', 'author')->paginate(3),
            'title' => $category->name
        ]);
    }
}
