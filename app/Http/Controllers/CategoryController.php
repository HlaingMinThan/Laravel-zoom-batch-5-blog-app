<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('home', [
            'blogs' =>  $category->blogs->load('category'),
            'title' => $category->name
        ]);
    }
}
