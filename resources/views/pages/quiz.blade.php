@extends('partials.master')
@section('page-title', __('keywords.questions'))
@section('content')

    <div class="container mt-4" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('result'))
                    <div class="alert alert-success my-3 text-center">
                        {{ session('result') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ __('keywords.test_your_understanding') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quiz.submit', $slug) }}" method="POST">
                            @csrf

                            <div id="questions-container">
                                @foreach ($questions as $question)
                                    <div class="question-block border rounded p-3 mb-3 bg-light">
                                        <input type="text" class="form-control mb-2" value="{{ $question->question }}"
                                            disabled>

                                        <div class="row">
                                            @foreach ($question->choices as $choice)
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-check">
                                                        <input class="custom-form-check-input" type="radio"
                                                            name="answers[{{ $question->id }}]" value="{{ $choice->id }}"
                                                            required>
                                                        <label class="form-check-label">
                                                            {{ $choice->choice }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @error("answers.{$question->id}")
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-success w-100 mt-3">{{ __('keywords.submit') }}</button>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
