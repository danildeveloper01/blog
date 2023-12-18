<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        return view('admin.main.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);

        return redirect()->route('admin.category');
    }

    public function show(Category $show)
    {
        return view('admin.categories.show', compact('show'));
    }

    public function edit(Category $show)
    {
        return view('admin.categories.update', compact('show'));
    }

    public function  update(UpdateRequest $request, Category $show)
    {
        $update_data = $request->validated();
        $show->update($update_data);

        return view('admin.categories.show', compact('show'));
    }

    public function delete(Category $show)
    {
        $show->delete();

        return redirect()->route('admin.category');
    }
}
