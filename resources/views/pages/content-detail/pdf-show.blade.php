@extends('partials.master')
@section('page-title', $content->name)
@section('content')
    <div class="container my-4" dir="rtl">
        <h1 class="text-center mb-5">{{ $content->name }}</h1>
        <div class="pdf-card">
            <embed src="{{ $content->getFirstMediaUrl('uploads') }}" width="100%" height="800px"
                sandbox="allow-scripts allow-same-origin"></embed>
        </div>
        <x-review-section :content-id="$content->id" :reviews="$reviews" />
    </div>
@endsection
