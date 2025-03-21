@extends('partials.master')
@section('page-title', __('keywords.add_category'))
@section('content')
    <div class="container my-4" dir=rtl>
        <h1 class="text-center mb-4">{{ __('keywords.add_content') }}</h1>
        <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('keywords.name') }}:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">{{ __('keywords.category') }}:</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                    <option value="pdf" {{ old('type') == 'pdf' ? 'selected' : '' }}>{{ __('keywords.pdf') }}</option>
                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>{{ __('keywords.video') }}
                    </option>
                    <option value="audio" {{ old('type') == 'audio' ? 'selected' : '' }}>{{ __('keywords.audio') }}
                    </option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="file" class="form-label">{{ __('keywords.file') }}:</label>
                    <input type="file" name="file" class="form-control">
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">{{ __('keywords.image') }}:</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{ __('keywords.description') }}:</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr>

            <h5 class="text-center my-3">{{ __('keywords.add_questions') }}</h5>
            <div id="questions-container">
                @php $questionIndex = 0; @endphp
                @if (old('questions'))
                    @foreach (old('questions') as $index => $question)
                        <div class="question-block border rounded p-3 mb-3 bg-light">
                            <label>السؤال:</label>
                            <input type="text" name="questions[{{ $index }}][question]" class="form-control mb-2"
                                value="{{ $question['question'] }}" required>

                            <label>الاختيارات:</label>
                            <div class="row">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="col-md-6 mb-2">
                                        <input type="text"
                                            name="questions[{{ $index }}][choices][{{ $i }}][choice]"
                                            class="form-control" value="{{ $question['choices'][$i]['choice'] ?? '' }}"
                                            required>
                                    </div>
                                @endfor
                            </div>

                            <label>{{ __('keywords.correct_answer') }}:</label>
                            <select name="questions[{{ $index }}][correct_choice]" class="form-select">
                                @for ($i = 0; $i < 4; $i++)
                                    <option value="{{ $i }}"
                                        {{ isset($question['correct_choice']) && $question['correct_choice'] == $i ? 'selected' : '' }}>
                                        الاختيار {{ $i + 1 }}
                                    </option>
                                @endfor
                            </select>

                            <button type="button" class="btn btn-danger mt-2 remove-question">حذف السؤال</button>
                        </div>
                        @php $questionIndex = $index + 1; @endphp
                    @endforeach
                @endif
                @error('questions')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="">
                <button type="button" id="add-question" class="btn btn-outline-success">
                    {{ __('keywords.add_new_question') }}
                </button>
            </div>

            <hr>

            <div class="">
                <button type="submit" class="btn btn-success">{{ __('keywords.save') }}</button>
            </div>

            <script>
                let questionIndex = {{ $questionIndex }};

                document.getElementById('add-question').addEventListener('click', function() {
                    let container = document.getElementById('questions-container');
                    let questionBlock = document.createElement('div');
                    questionBlock.classList.add('question-block', 'border', 'rounded', 'p-3', 'mb-3', 'bg-light');

                    questionBlock.innerHTML = `
                        <label>السؤال:</label>
                        <input type="text" name="questions[${questionIndex}][question]" class="form-control mb-2" required>

                        <label>الاختيارات:</label>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" name="questions[${questionIndex}][choices][0][choice]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="questions[${questionIndex}][choices][1][choice]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="questions[${questionIndex}][choices][2][choice]" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="questions[${questionIndex}][choices][3][choice]" class="form-control" required>
                            </div>
                        </div>

                        <label>الإجابة الصحيحة:</label>
                        <select name="questions[${questionIndex}][correct_choice]" class="form-select">
                            <option value="0">الاختيار الأول</option>
                            <option value="1">الاختيار الثاني</option>
                            <option value="2">الاختيار الثالث</option>
                            <option value="3">الاختيار الرابع</option>
                        </select>

                        <!-- زر حذف السؤال -->
                        <button type="button" class="btn btn-danger mt-2 remove-question">حذف السؤال</button>
                    `;

                    container.appendChild(questionBlock);
                    questionIndex++;

                    updateRemoveButtons();
                });

                document.getElementById('questions-container').addEventListener('click', function(event) {
                    if (event.target.classList.contains('remove-question')) {
                        event.target.parentElement.remove();
                        updateRemoveButtons();
                    }
                });

                function updateRemoveButtons() {
                    let removeButtons = document.querySelectorAll('.remove-question');
                    removeButtons.forEach(button => {
                        button.style.display = removeButtons.length > 0 ? 'block' : 'none';
                    });
                }

                updateRemoveButtons();
            </script>
        @endsection
