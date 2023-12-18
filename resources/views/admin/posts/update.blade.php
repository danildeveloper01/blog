@extends('admin.layouts.default')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update post "{{$show->title}}"</h1>
                </div><!-- /.col -->
               <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.post.update', $show->id) }}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf
                    @method('PATCH')
                    <div class="form-group w-50">
                        <label for="title-post">Title post</label>
                        <input type="text" class="form-control" id="title-post" name="title" placeholder="Title post" value="{{ $show->title }}">
                        @error('title')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="summernote">Content</label>
                        <textarea id="summernote" name="content">{{ $show->content }}</textarea>
                        @error('content')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Preview photo</label>
                        <div class="w-50 mb-2">
                            <img src="{{ asset('storage/'.$show->preview_img) }}" alt="preview_img" class="w-25">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="preview_img" class="custom-file-input" id="exampleInputFile" style="cursor: pointer">
                                <label class="custom-file-label" for="exampleInputFile">Add image</label>
                            </div>
                        </div>
                        @error('preview_img')
                        <p style="color: red">The preview photo field is required.</p>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Main photo (the main photo of the post)</label>
                        <div class="w-50 mb-2">
                            <img src="{{ asset('storage/'.$show->main_img) }}" alt="main_img" class="w-25">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="main_img" class="custom-file-input" id="exampleInputFile" style="cursor: pointer">
                                <label class="custom-file-label" for="exampleInputFile">Add image</label>
                            </div>
                        </div>
                        @error('main_img')
                        <p style="color: red">The main photo field is required.</p>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label>Post category</label>
                        <select name="category_id" class="form-control">
                            <option selected disabled style="display: none" value="">Select a post category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <p style="color: red">The post category field is required.</p>
                        @endif
                    </div>
                    <div class="form-group w-50">
                        <label>Post tags</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a post tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ $show->tags->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Update post</button>
                </form>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
