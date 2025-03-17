<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid mx-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-book"></i> {{ __('keywords.website_title') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex navbar-search" role="search">
                <input class="form-control" type="search" placeholder="... ابحث هنا" aria-label="Search">
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
                            <li><a class="dropdown-item" href="#">{{ __('keywords.profile') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('keywords.settings') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link mt-2 text-danger text-end">{{ __('keywords.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item d-lg-none mt-5">
                        <a class="nav-link mt-2 text-end" href="#">{{ __('keywords.profile') }}</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link mt-2 text-end" href="#">{{ __('keywords.settings') }}</a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="nav-link mt-2 text-danger text-end">{{ __('keywords.logout') }}</button>
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
    <a class="pages-bar-link" href="#">{{ __('keywords.main') }}</a>
    <a class="pages-bar-link" href="#">{{ __('keywords.books') }}</a>
    <a class="pages-bar-link" href="#">{{ __('keywords.videos') }}</a>
    <a class="pages-bar-link" href="#">{{ __('keywords.sounds') }}</a>
</div>
