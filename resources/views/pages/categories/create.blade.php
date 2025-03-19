@extends('partials.master')
@section('page-title', __('keywords.add_category'))
@section('content')
    <div class="container mt-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.add_category') }}</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="mb-4">{{ __('keywords.category_name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success mt-4">{{ __('keywords.add') }}</button>
        </form>
    </div>
@endsection
