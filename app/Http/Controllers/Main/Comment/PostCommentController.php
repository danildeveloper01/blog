<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);
        return redirect()->route('main.post_single', $post->id);
    }




}
