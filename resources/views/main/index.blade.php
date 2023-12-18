@extends('layouts.default')

@section('content')

<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ 'storage/'.$post->preview_img }}" alt="blog post">
                        </div>
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                        <a href="{{ route('post.single', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links() }}
            </div>
        </section>


</main>

@endsection
