<!DOCTYPE html>
<html lang="ar">

@include('partials.head')

<body class="d-flex flex-column min-vh-100">
    @extends('partials.header')
    <div class="main-page  flex-grow-1">
        @yield('content')
    </div>
    @extends('partials.footer')

    <div class="loader-container">
        <img src="images/loader-img.gif" alt="">
    </div>

    @include('partials.scripts')
</body>

</html>
