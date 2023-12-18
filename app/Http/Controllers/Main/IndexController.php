<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        return view('main.index', compact('posts'));
    }

    public function single(Post $post)
    {
        $date = Carbon::parse($post->created_at);

        return view('main.post_single', compact('post', 'date'));
    }


}
