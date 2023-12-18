<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);

        } catch (\Exception $exception){
            abort(404);
        }
    }


}
