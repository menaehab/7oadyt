<div class="card mx-2 my-4 shadow-sm" style="width: 18rem;">
    <img src="{{ $image ? $image : './images/book-7.png' }}" class="card-img-top img-fluid" alt="{{ $title }}">
    <div class="card-body text-center">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text text-muted">{{ Str::limit($description, 100) }}</p>
        <a href="{{ $url }}" class="btn btn-success">{{ __('keywords.read_more') }}</a>
    </div>
</div>
