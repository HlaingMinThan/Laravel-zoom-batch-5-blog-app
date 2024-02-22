<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

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

        return back();
    }
}
