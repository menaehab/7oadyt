@extends('partials.master')
@section('page-title', __('keywords.edit_category'))
@section('content')
    <div class="container my-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.edit_content') }}</h1>
        <form action="{{ route('contents.update', $content) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('keywords.name') }}:</label>
                <input type="text" name="name" value="{{ old('name', $content->name) }}" class="form-control"
                    id="name" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">{{ __('keywords.category') }}:</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $content->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">{{ __('keywords.type') }}:</label>
                <select name="type" class="form-select" required>
                    <option value="pdf" {{ old('type', $content->type) == 'pdf' ? 'selected' : '' }}>
                        {{ __('keywords.pdf') }}</option>
                    <option value="video" {{ old('type', $content->type) == 'video' ? 'selected' : '' }}>
                        {{ __('keywords.video') }}</option>
                    <option value="audio" {{ old('type', $content->type) == 'audio' ? 'selected' : '' }}>
                        {{ __('keywords.audio') }}</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="file" class="form-label">{{ __('keywords.file') }}:</label>
                    <input type="file" name="file" class="form-control">

                    @if ($content->hasMedia('uploads'))
                        <p>ملف حالي: <a class="text-success text-decoration-none"
                                href="{{ $content->getFirstMediaUrl('uploads') }}"
                                target="_blank">{{ __('keywords.show') }}</a></p>
                    @endif

                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">{{ __('keywords.image') }}:</label>
                    <input type="file" name="image" class="form-control">

                    @if ($content->hasMedia('images'))
                        <p>صورة حالية: <a class="text-success text-decoration-none"
                                href="{{ $content->getFirstMediaUrl('images') }}"
                                target="_blank">{{ __('keywords.show') }}</a>
                        </p>
                    @endif

                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">{{ __('keywords.description') }}:</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $content->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <h5 class="text-center my-3">{{ __('keywords.edit_questions') }}</h5>
            <div id="questions-container">
                @foreach ($content->questions as $index => $question)
                    <div class="question-block border rounded p-3 mb-3 bg-light">
                        <label>السؤال:</label>
                        <input type="text" name="questions[{{ $index }}][question]" class="form-control mb-2"
                            value="{{ $question->question }}" required>

                        <label>الاختيارات:</label>
                        <div class="row">
                            @foreach ($question->choices as $choiceIndex => $choice)
                                <div class="col-md-6 mb-2">
                                    <input type="text"
                                        name="questions[{{ $index }}][choices][{{ $choiceIndex }}][choice]"
                                        class="form-control" value="{{ $choice->choice }}" required>
                                </div>
                            @endforeach
                        </div>

                        <label>الإجابة الصحيحة:</label>
                        <select name="questions[{{ $index }}][correct_choice]" class="form-select">
                            @foreach ($question->choices as $choiceIndex => $choice)
                                <option value="{{ $choiceIndex }}"
                                    {{ $question->correct_choice == $choiceIndex ? 'selected' : '' }}>
                                    الاختيار {{ $choiceIndex + 1 }}
                                </option>
                            @endforeach
                        </select>

                        <!-- زر حذف السؤال -->
                        <button type="button" class="btn btn-danger mt-2 remove-question">حذف السؤال</button>
                    </div>
                @endforeach
            </div>

            <div class="d-grid">
                <button type="button" id="add-question"
                    class="btn btn-outline-success">{{ __('keywords.add_new_question') }}</button>
            </div>

            <hr>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">{{ __('keywords.update') }}</button>
            </div>
        </form>

        <script>
            let questionIndex = {{ $content->questions->count() }};

            document.getElementById('add-question').addEventListener('click', function() {
                let container = document.getElementById('questions-container');
                let questionBlock = document.createElement('div');
                questionBlock.classList.add('question-block', 'border', 'rounded', 'p-3', 'mb-3', 'bg-light');

                questionBlock.innerHTML = `
                        <label>السؤال:</label>
                        <input type="text" name="questions[${questionIndex}][question]" class="form-control mb-2" required>
                        <label>الاختيارات:</label>
                        <div class="row">
                            ${[0,1,2,3].map(i => `
                                                        <div class="col-md-6 mb-2">
                                                            <input type="text" name="questions[${questionIndex}][choices][${i}][choice]" class="form-control" required>
                                                        </div>`).join('')}
                        </div>
                        <label>الإجابة الصحيحة:</label>
                        <select name="questions[${questionIndex}][correct_choice]" class="form-select">
                            ${[0,1,2,3].map(i => `<option value="${i}">الاختيار ${i+1}</option>`).join('')}
                        </select>

                        <!-- زر حذف السؤال -->
                        <button type="button" class="btn btn-danger mt-2 remove-question">حذف السؤال</button>
                    `;

                container.appendChild(questionBlock);
                questionIndex++;
            });

            document.getElementById('questions-container').addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-question')) {
                    event.target.closest('.question-block').remove();
                }
            });
        </script>
    @endsection
