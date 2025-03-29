@extends('partials.master')
@section('page-title', __('keywords.view_content'))
@section('content')
    <div class="container my-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.view_content') }}</h1>

        <form>
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('keywords.name') }}:</label>
                <input type="text" name="name" value="{{ $content->name }}" class="form-control" id="name" disabled>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">{{ __('keywords.category') }}:</label>
                <select name="category_id" class="form-select" disabled>
                    <option>{{ $content->category->name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">{{ __('keywords.type') }}:</label>
                <select name="type" class="form-select" disabled>
                    <option>{{ __('keywords.' . $content->type) }}</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    @if ($content->hasMedia('uploads'))
                        <p>ملف حالي: <a class="text-success text-decoration-none"
                                href="{{ $content->getFirstMediaUrl('uploads') }}"
                                target="_blank">{{ __('keywords.show') }}</a></p>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    @if ($content->hasMedia('images'))
                        <p>صورة حالية: <a class="text-success text-decoration-none"
                                href="{{ $content->getFirstMediaUrl('images') }}"
                                target="_blank">{{ __('keywords.show') }}</a>
                        </p>
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{ __('keywords.description') }}:</label>
                <textarea name="description" class="form-control" rows="3" disabled>{{ $content->description }}</textarea>
            </div>

            <hr>

            <h5 class="text-center my-3">{{ __('keywords.questions') }}</h5>
            <div id="questions-container">
                @foreach ($content->questions as $index => $question)
                    <div class="question-block border rounded p-3 mb-3 bg-light">
                        <label>السؤال:</label>
                        <input type="text" class="form-control mb-2" value="{{ $question->question }}" disabled>

                        <label>الاختيارات:</label>
                        <div class="row">
                            @foreach ($question->choices as $i => $choice)
                                <div class="col-md-6 mb-2">
                                    <input type="text" class="form-control" value="{{ $choice->choice }}" disabled>
                                </div>
                            @endforeach
                        </div>

                        <label>{{ __('keywords.correct_answer') }}</label>
                        <select class="form-select" disabled>
                            <option>{{ $question->correctChoice->choice }}</option>
                        </select>
                    </div>
                @endforeach
            </div>

            <hr>

            <div class="d-grid">
                <a href="{{ route('contents.index') }}" class="btn btn-success">{{ __('keywords.back') }}</a>
            </div>
        </form>
    </div>
@endsection
