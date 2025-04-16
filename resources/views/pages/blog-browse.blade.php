@extends('partials.master')
@section('page-title', __('keywords.blog_browse'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <div class="row justify-content-center">
            @if ($blogs->count() > 0)
                @foreach ($blogs as $blog)
                    <x-blog-card :title="$blog->name" :image="$blog->getFirstMediaUrl('blogs_images') ?: asset('images/book1.png')" :url="route('browse.blogs.show', $blog->slug)" :content="$blog->content" />
                @endforeach
                <div class="">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="alert alert-danger" role="alert">{{ __('keywords.no_blogs') }}</div>
            @endif
        </div>
    </div>
@endsection
