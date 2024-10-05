<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Aplikasi Saya')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
