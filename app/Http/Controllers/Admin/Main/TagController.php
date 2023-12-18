<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\StoreRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();

        return view('admin.main.tags', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);

        return redirect()->route('admin.tag');
    }

    public function show(Tag $show)
    {
        return view('admin.tags.show', compact('show'));
    }

    public function edit(Tag $show)
    {
        return view('admin.tags.update', compact('show'));
    }

    public function  update(UpdateRequest $request, Tag $show)
    {
        $update_data = $request->validated();
        $show->update($update_data);

        return view('admin.tags.show', compact('show'));
    }

    public function delete(Tag $show)
    {
        $show->delete();

        return redirect()->route('admin.tag');
    }
}
