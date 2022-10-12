<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        a{
            text-decoration: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
</head>
<body class="container mt-5">
    <nav>
        @if(Auth::check())
            <a href="/home">Home /</a>
            <a href="/blog">Blog /</a>
            <a href="/blog/create">New Blog /</a>
            <a href="/course">Course</a>

            <form action="{{route("logout")}}" method="POST" class="d-inline">
                @csrf
                <button class="btn" type="submit">Logout</button>
            </form>
        @else
            <a href="/">Home</a>
            <a href="/blog">Blog</a>
        @endif
        
    </nav>

    <main>
        @yield("content")
    </main>
</body>
</html>
