@extends('partials.master')
@section('page-title', $blog->name)
@section('content')
    <div class="container my-4" dir="rtl">
        <h1 class="text-center mb-5">{{ $blog->name }}</h1>
        <div class="img-card">
            <img src="{{ $blog->getFirstMediaUrl('blogs_images') }}" width="100%" height="400px"></img>
        </div>
        <p class="border p-3 my-4">{{ $blog->content }}</p>
    </div>
@endsection
