@extends('partials.master')
@section('page-title', $content->name)
@section('content')
    <div class="container my-4">
        <h1 class="text-center mb-5">{{ $content->name }}</h1>
        <div class="pdf-card text-center">
            <audio controls>
                <source src="{{ $content->getFirstMediaUrl('uploads') }}" type="audio/mp3">
                {{ __('keywords.audio_not_supported') }}
            </audio>
        </div>
        <x-review-section :content-id="$content->id" :reviews="$reviews" />

    </div>
@endsection
