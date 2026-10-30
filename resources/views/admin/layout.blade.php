<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | {{ config('jst.brand.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">Dhurva<span>Tech</span></a>
            <p class="admin-sidebar-label">Workspace</p>
            <a class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'admin-nav-link-active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="admin-nav-link {{ request()->routeIs('admin.blog.*') ? 'admin-nav-link-active' : '' }}" href="{{ route('admin.blog.index') }}">Blog</a>
            <a class="admin-nav-link" href="{{ route('home') }}">Lihat website</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="admin-nav-link admin-logout" type="submit">Keluar</button>
            </form>
        </aside>
        <main class="admin-main">
            @yield('content')
        </main>
    </div>
</body>
</html>