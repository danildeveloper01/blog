<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\StoreRequest;
use App\Http\Requests\Admin\Posts\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();

        return view('admin.main.posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post');
    }

    public function show(Post $show)
    {
        return view('admin.posts.show', compact('show'));
    }

    public function edit(Post $show)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.update', compact('show', 'tags', 'categories'));
    }

    public function  update(UpdateRequest $request, Post $show)
    {
        $data = $request->validated();

        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        if ($request->hasFile('preview_img')) {
            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
        }

        if ($request->hasFile('main_img')) {
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
        }

        $show->update($data);
        $show->tags()->sync($tagIds);

        return view('admin.posts.show', compact('show'));
    }

    public function delete(Post $show)
    {
        $show->delete();

        return redirect()->route('admin.post');
    }
}
