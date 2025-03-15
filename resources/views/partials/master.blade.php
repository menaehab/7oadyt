<!DOCTYPE html>
<html lang="ar">

@include('partials.head')

<body>
    @extends('partials.header')
    <div class="main-page">
        @yield('content')
    </div>
    @extends('partials.footer')

    @include('partials.scripts')
</body>

</html>
