<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogInController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        //validation , pass -> run another line of code ,fail- redirect back
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'email m shi par buuu'
        ]);

        $user = User::where('email', request('email'))->first();
        if ($user) {
            if (Hash::check(request('password'), $user->password)) {
                auth()->login($user);
                return redirect('/')->with('success', 'Logged In . ' . $user->name);
            } else {
                return back()->withErrors([
                    'password' => 'wrong password'
                ]);
            }
        } else {
            return back()->withErrors([
                'email' => 'no user exists with this email'
            ]);
        }
    }
}
