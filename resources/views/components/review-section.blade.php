<div dir="rtl">
    <div class="mt-4">
        <h3 class="mb-3 text-center">{{ __('keywords.rates') }}</h3>
        @if (session('success'))
            <div class="alert alert-success my-2">{{ session('success') }}</div>
        @endif
        <form id="review-form" action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="content_id" value="{{ $contentId }}">
            <input type="hidden" name="rating" id="rating-value" value="0">
            <div class="mb-3">
                <label for="rating" class="form-label">{{ __('keywords.your_rating') }}:</label>
                <div class="star-rating">
                    <i class="fa-solid fa-star star-rate" data-value="5"></i>
                    <i class="fa-solid fa-star star-rate" data-value="4"></i>
                    <i class="fa-solid fa-star star-rate" data-value="3"></i>
                    <i class="fa-solid fa-star star-rate" data-value="2"></i>
                    <i class="fa-solid fa-star star-rate" data-value="1"></i>
                </div>
            </div>
            @error('rating')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="comment" class="form-label">{{ __('keywords.comment') }}:</label>
                <textarea name="comment" class="form-control" placeholder="{{ __('keywords.write_your_comment') }}" required></textarea>
            </div>
            @error('comment')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-success">{{ __('keywords.submit_comment') }}</button>
        </form>
    </div>
    @if ($reviews->count() > 0)
        <div class="mt-4">
            <div id="reviews-list">
                @foreach ($reviews as $review)
                    <div class="card mb-4 border-start border-success shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold text-success mb-2">{{ $review->user->name }}</h5>
                            <div class="mb-2">
                                @for ($i = 0; $i < 5 - $review->rating; $i++)
                                    <i class="fa-solid gray-star fa-star"></i>
                                @endfor
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <i class="fa-solid gold-star fa-star"></i>
                                @endfor
                            </div>
                            <div class="mb-3 bg-light p-3 rounded">
                                <p class="mb-0 text-muted">{{ $review->comment }}</p>
                            </div>
                            @if (Auth::user()->id === $review->user_id)
                                <form method="POST" action="{{ route('reviews.destroy', $review) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">{{ __('keywords.delete') }}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
