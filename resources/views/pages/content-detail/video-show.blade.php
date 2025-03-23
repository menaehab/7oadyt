@extends('partials.master')
@section('page-title', $content->name)
@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-5">{{ $content->name }}</h1>
        <div class="pdf-card">
            <video width="100%" height="800px" controls>
                <source src="{{ $content->getFirstMediaUrl('uploads') }}" type="video/mp4">
                {{ __('keywords.video_not_supported') }}
            </video>

        </div>
    </div>
@endsection
