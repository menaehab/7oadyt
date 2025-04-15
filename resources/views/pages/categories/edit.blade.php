@extends('partials.master')
@section('page-title', __('keywords.edit_category'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.edit_category') }}</h1>
        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name" class="mb-4">{{ __('keywords.category_name') }}</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-4" id="name"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('keywords.edit') }}</button>
        </form>
    </div>
@endsection
