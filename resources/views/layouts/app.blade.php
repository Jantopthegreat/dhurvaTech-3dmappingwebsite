<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Dhurva Tech Angkasa Raya — surveying, mapping, and geospatial solutions.')">
    <meta name="theme-color" content="#082d62">
    <title>@yield('title', config('jst.brand.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>
    @include('partials.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.whatsapp-button')
</body>
</html>
