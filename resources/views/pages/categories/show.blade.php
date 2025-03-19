@extends('partials.master')
@section('page-title', __('keywords.show_category'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.show_category') }}</h1>
        <div>
            <div class="form-group">
                <label for="name" class="mb-4">{{ __('keywords.category_name') }}</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-4" id="name"
                    disabled>
            </div>
        </div>
    </div>
@endsection
