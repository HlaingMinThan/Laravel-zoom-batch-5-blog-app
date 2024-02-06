<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {

        return view('home', [
            'title' => $user->name . "'s blogs",
            'blogs' => $user->blogs()->with('category', 'author')->paginate(3)
        ]);
    }
}
