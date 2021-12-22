<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.head')
</head>
<body>
    @include('partials.header')
    <div class="container mt-5">
        <div class="row">
            @yield('content')
            @include('partials.sidebar')
        </div>
    </div>
    @include('partials.footer')
</body>
</html>