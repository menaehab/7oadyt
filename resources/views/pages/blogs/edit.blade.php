@extends('partials.master')
@section('page-title', __('keywords.edit_blog'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.edit_blog') }}</h1>
        <form action="{{ route('blogs.update', $blog->slug) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="mb-4">{{ __('keywords.blog_name') }}</label>
                <input type="text" name="name" value="{{ old('name', $blog->name) }}" class="form-control"
                    id="name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="image" class="form-label">{{ __('keywords.image') }}:</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">{{ __('keywords.blog_content') }}:</label>
                <textarea name="content" class="form-control" rows="3">{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-4">{{ __('keywords.edit') }}</button>
        </form>
    </div>
@endsection
