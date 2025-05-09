<div class="card mx-2 my-4 shadow-sm overflow-hidden" style="width: 18rem; height: 22rem;">
    <div style="height: 70%; overflow: hidden;">
        <img src="{{ $image ? $image : asset('images/book1.png') }}" class="card-img-top img-fluid"
            alt="{{ $title }}" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="card-body text-center d-flex flex-column justify-content-between" style="height: 50%;">
        <div>
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text text-muted" style="font-size: 0.9rem;">{{ Str::limit($content, 50) }}</p>
        </div>
        <a href="{{ $url }}" class="btn btn-primary btn-sm">{{ __('keywords.read_more') }}</a>
    </div>
</div>
