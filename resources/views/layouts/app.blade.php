<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Mi App')</title> 
</head>

<body>

    @include('partials.nav')

    <div>
        @yield('content')
    </div>

    @include('partials.footer')

</body>

</html>