<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('./images/logo-2.png') }}" width="50px" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form method="GET" action="{{ route('contents.search') }}" class="d-flex navbar-search" role="search">
                <input name="search" value="{{ request('search') }}" class="form-control" type="search"
                    placeholder="... ابحث هنا" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            @if (Auth::check())
                <ul class="navbar-nav ms-auto user-menu">
                    <li class="nav-item dropdown d-lg-block d-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->hasRole('admin'))
                                <li><a class="dropdown-item"
                                        href="{{ route('categories.index') }}">{{ __('keywords.categories') }}
                                    </a></li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('contents.index') }}">{{ __('keywords.contents') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('blogs.index') }}">{{ __('keywords.blogs') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link text-danger text-end">{{ __('keywords.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <div class="mt-5"></div>
                    @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item d-lg-none">
                            <a class="nav-link mt-2 text-end"
                                href="{{ route('categories.index') }}">{{ __('keywords.categories') }}</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link mt-2 text-end"
                                href="{{ route('contents.index') }}">{{ __('keywords.contents') }}</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link mt-2 text-end"
                                href="{{ route('blogs.index') }}">{{ __('keywords.blogs') }}</a>
                        </li>
                    @endif

                    <li class="nav-item d-lg-none">
                        <form action="{{ route('logout') }}" method="POST" dir="rtl">
                            @csrf
                            <button type="submit"
                                class="nav-link mt-2 text-danger">{{ __('keywords.logout') }}</button>
                        </form>
                    </li>
                </ul>
            @else
                <div class="navbar-nav ms-auto d-lg-block d-none">
                    <a href="{{ route('login') }}" class="btn btn-outline-success">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-success mx-2">{{ __('Register') }}</a>
                </div>

                <ul class="navbar-nav ms-auto d-lg-none">
                    <li class="nav-item mt-5">
                        <a class="nav-link mt-2 text-end" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mt-2 text-end" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

<div class="pages-bar text-center">
    {{-- <a class="pages-bar-link" href="{{ route('home') }}">
        🏠 {{ __('keywords.main') }}
    </a> --}}
    <a class="pages-bar-link" href="{{ route('browse') }}">
        🌍 {{ __('keywords.all') }}
    </a>
    <div class="custom-dropdown">
        <button class="custom-dropdown-toggle">
            📂 {{ __('keywords.categories') }}
        </button>
        <div class="custom-dropdown-menu">
            @foreach ($categories as $category)
                <a class="custom-dropdown-item" href="{{ route('contents.category', $category->slug) }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
    <a class="pages-bar-link" href="{{ route('browse', 'pdf') }}">
        📚 {{ __('keywords.books') }}
    </a>
    <a class="pages-bar-link" href="{{ route('browse', 'video') }}">
        🎥 {{ __('keywords.videos') }}
    </a>
    <a class="pages-bar-link" href="{{ route('browse', 'audio') }}">
        🎵 {{ __('keywords.sounds') }}
    </a>
    <a class="pages-bar-link" href="{{ route('browse.blogs') }}">
        📝 {{ __('keywords.blogs') }}
    </a>
</div>
