@extends('partials.master')
@section('page-title', __('keywords.show_blog'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.show_blog') }}</h1>
        <div>
            <div class="form-group">
                <label for="name" class="mb-4">{{ __('keywords.blog_name') }}</label>
                <input type="text" name="name" value="{{ $blog->name }}" class="form-control mb-4" id="name"
                    disabled>
            </div>
            @if ($blog->hasMedia('blogs_images'))
                <div class="mb-3">
                    <p>ملف حالي: <a class="text-primary text-decoration-none"
                            href="{{ $blog->getFirstMediaUrl('blogs_images') }}"
                            target="_blank">{{ __('keywords.show') }}</a>
                    </p>
                </div>
            @endif
            <div class="mb-3">
                <label for="content" class="form-label">{{ __('keywords.blog_content') }}:</label>
                <textarea name="content" class="form-control" rows="3" disabled>{{ $blog->content }}</textarea>
            </div>
        </div>
    </div>
@endsection
