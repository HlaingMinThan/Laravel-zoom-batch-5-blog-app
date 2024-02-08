<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        //backend validation , pass -> run another line , fail - auto redirect back
        request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:14']
        ]);

        //register
        $user = new User();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password'); // 'hlaingminthan' => hashed
        $user->save();

        //login
        auth()->login($user);

        return redirect('/');
    }
}
