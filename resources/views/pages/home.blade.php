@extends('partials.master')
@section('page-title', __('keywords.home'))

@section('content')
    <!-- Home-books starts -->
    <section class="Home-books text-center" id="Home-books">
        <div class="row">
            <div class="content">
                <h3>{{ __('keywords.welcome') }}</h3>
                <p>
                    {{ __('keywords.home_description') }}
                </p>
                <a href="{{ route('browse') }}" class="btn btn-lg btn-success">{{ __('keywords.lets_go') }}</a>
            </div>
            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-1.png" alt=""></a>
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-2.png" alt=""></a>
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-3.png" alt=""></a>
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-4.png" alt=""></a>
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-5.png" alt=""></a>
                    <a href="{{ route('browse') }}" class="swiper-slide"><img src="./images/book-6.png" alt=""></a>
                </div>
                <img src="./images/stand.png" class="stand" alt="">
            </div>
        </div>
    </section>
    <!-- Home-books ends -->

    <!--latest section starts-->
    <section class="latest-books" id="latest-books">
        <h1 class="heading"><span>{{ __('keywords.latest_contents') }}</span></h1>
        <div class="swiper latest-slider">
            <div class="swiper-wrapper">
                @foreach ($contents as $content)
                    <x-book-card :title="$content->name" image="{{ $content->getFirstMediaUrl('images') }}" :url="route('show', $content->slug)"
                        :description="$content->description" :avgRating="$content->avg_rating" />
                @endforeach
            </div>
        </div>
    </section>
    <!--latest section ends-->

    <!-- library section starts  -->
    <section class="library">
        <div class="image">
            <img src="images/deal-img.jpg" alt="{{ __('keywords.online_libary') }}">
        </div>
        <div class="content text-end">
            <h3>{{ __('keywords.world_of_knowledge') }}</h3>
            <h1>{{ __('keywords.online_libary_free') }}</h1>
            <p>{{ __('keywords.online_libary_description') }}</p>
            <a href="{{ route('browse') }}" class="btn btn-lg btn-success"> {{ __('keywords.lets_go') }}</a>
        </div>
    </section>
    <!-- library section ends -->

    <!--latest section starts-->
    <section class="latest-blogs" id="latest-blogs">
        <h1 class="heading"><span>{{ __('keywords.latest_blogs') }}</span></h1>
        <div class="swiper latest-slider">
            <div class="swiper-wrapper">
                @foreach ($blogs as $blog)
                    <div class="swiper-slide ">
                        <div class="card mx-2 my-4 shadow-sm overflow-hidden" style="width: 18rem; height: 22rem;">
                            <div style="height: 70%; overflow: hidden;">
                                <img src="{{ $blog->getFirstMediaUrl('blogs_images') ? $blog->getFirstMediaUrl('blogs_images') : './images/book-1.png' }}"
                                    class="card-img-top img-fluid" alt="{{ $blog->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body text-center d-flex flex-column justify-content-between"
                                style="height: 50%;">
                                <div>
                                    <h5 class="card-title">{{ $blog->name }}</h5>
                                    <p class="card-text text-muted" style="font-size: 0.9rem;">
                                        {{ Str::limit($blog->content, 50) }}</p>
                                </div>
                                <a href="{{ route('browse.blogs.show', $blog->slug) }}"
                                    class="btn btn-success btn-sm">{{ __('keywords.read_more') }}</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--latest section ends-->

    <!-- Digital Guidance for Kids starts -->
    <section class="digital-guidance text-center" id="digital-guidance">
        <h1 class="heading mb-5"><span>{{ __('keywords.digital_guidance') }}</span></h1>
        <div class="row mt-5 d-flex align-items-center">
            <div class="col-md-6">
                <img src="./images/kid-reading-2.jpg" alt="{{ __('keywords.digital_guidance') }}"
                    class="img-fluid rounded-4">
            </div>
            <div class="col-md-6 text-end">
                <h1 class="mb-3 text-success">{{ __('keywords.safe_exploration') }}</h1>
                <h5 class="mb-3">{{ __('keywords.digital_guidance_description') }}</h5>
                <ul>
                    <li class="mb-2">{{ __('keywords.guideline_1') }}</li>
                    <li class="mb-2">{{ __('keywords.guideline_2') }}</li>
                    <li class="mb-2">{{ __('keywords.guideline_3') }}</li>
                    <li class="mb-2">{{ __('keywords.guideline_4') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Digital Guidance for Kids ends -->

    <div class="loader-container">
        <img src="images/loader-img.gif" alt="">
    </div>
@endsection
