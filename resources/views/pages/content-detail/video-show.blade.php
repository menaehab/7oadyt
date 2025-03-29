@extends('partials.master')
@section('page-title', $content->name)
@section('content')
    <div class="container my-4" dir="rtl">
        <h1 class="text-center mb-5">{{ $content->name }}</h1>
        <div class="pdf-card">
            <video width="100%" height="800px" controls>
                <source src="{{ $content->getFirstMediaUrl('uploads') }}" type="video/mp4">
                {{ __('keywords.video_not_supported') }}
            </video>
        </div>
        <div class="quiz-section mt-5">
            <h2 class="mb-3">الاختبار</h2>

            @if ($previousResult)
                <div class="alert alert-success">
                    <strong>{{ __('keywords.previous_result') }}:</strong> {{ $previousResult->correct_answers }} /
                    {{ $previousResult->total_questions }}
                    <br>
                    <strong> {{ __('keywords.percentage') }}:</strong> {{ $previousResult->score_percentage }}%
                </div>
            @endif

            <a href="{{ route('quiz.index', $content->slug) }}"
                class="btn btn-success">{{ __('keywords.test_your_understanding') }}</a>
        </div>
        <x-review-section :content-id="$content->id" :reviews="$reviews" />
    </div>
@endsection
