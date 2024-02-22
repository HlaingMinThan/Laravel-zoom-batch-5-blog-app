<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;

class SubscriberController extends Controller
{
    public function store(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->subscribedUsers()->detach(auth()->id());
        } else {
            $blog->subscribedUsers()->attach(auth()->id());
        }
        return back();
    }
}
