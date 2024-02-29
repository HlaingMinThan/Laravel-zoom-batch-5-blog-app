<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->body = request('body');
        $comment->user_id = auth()->user()->id;
        $comment->blog_id =  $blog->id;
        $comment->save();

        //blocking code
        $blog->subscribedUsers->each(function ($user) use ($comment) {
            if (auth()->id() != $user->id) {
                Mail::to($user->email)
                    ->send(new SubscriberMail($comment));
            }
        });
        return back();
    }
}
