<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PostUserLike;
use App\Models\Post;

class LikeController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likePosts;
        return view('profile.main.like', compact('posts'));
    }

    public function delete(Post $post)
    {
        $posts = auth()->user()->likePosts()->detach($post->id);
        return redirect()->route('profile.like');
    }

}
