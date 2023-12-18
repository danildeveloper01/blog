<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        return view('profile.main.comment', compact('comments'));
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('profile.comment');
    }

}
