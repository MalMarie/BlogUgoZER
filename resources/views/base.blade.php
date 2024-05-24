<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog UgoZER</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100">
    @include('partials.header')
    @include('partials.nav')
    <main>

    </main>
    @include('partials.footer')
    @vite('resources/js/app.js')
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>