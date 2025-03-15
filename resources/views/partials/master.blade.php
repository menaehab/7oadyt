<!DOCTYPE html>
<html lang="ar">

@include('partials.head')

<body>
    @extends('partials.header')
    <div class="main-page">
        @yield('content')
    </div>
    @extends('partials.footer')

    <div class="loader-container">
        <img src="images/loader-img.gif" alt="">
    </div>

    @include('partials.scripts')
</body>

</html>
