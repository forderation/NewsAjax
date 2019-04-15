<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Title untuk halaman --}}
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- Konten untuk halaman --}}
    <div class="container">
        <div class="row">
            @yield('body')
        </div>
    </div>
</body>

</html>