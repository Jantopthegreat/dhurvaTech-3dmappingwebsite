<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | {{ config('jst.brand.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">Dhurva<span>Tech</span></a>
            <p class="admin-sidebar-label">Workspace</p>
            <a class="admin-nav-link admin-nav-link-active" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="admin-nav-link" href="{{ route('admin.blog.index') }}">Blog</a>
            <a class="admin-nav-link" href="{{ route('home') }}">Lihat website</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="admin-nav-link admin-logout" type="submit">Keluar</button>
            </form>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <div>
                    <p class="admin-kicker">Overview</p>
                    <h1>Selamat datang, {{ auth()->user()->name }}</h1>
                </div>
                <span class="admin-user-badge">Admin</span>
            </header>

            <section class="admin-stats" aria-label="Ringkasan website">
                <article class="admin-stat-card">
                    <span class="admin-stat-label">Total akun pengguna</span>
                    <strong>{{ $userCount }}</strong>
                    <span class="admin-stat-note">Terdaftar di sistem</span>
                </article>
                <article class="admin-stat-card">
                    <span class="admin-stat-label">Artikel blog</span>
                    <strong>{{ $articleCount }}</strong>
                    <span class="admin-stat-note">Konten tersimpan</span>
                </article>
                <article class="admin-stat-card admin-stat-card-accent">
                    <span class="admin-stat-label">Status website</span>
                    <strong>Aktif</strong>
                    <span class="admin-stat-note">Semua layanan berjalan</span>
                </article>
                <article class="admin-stat-card">
                    <span class="admin-stat-label">Akses terakhir</span>
                    <strong>Hari ini</strong>
                    <span class="admin-stat-note">Sesi admin aktif</span>
                </article>
            </section>

            <section class="admin-welcome-panel">
                <p class="admin-kicker">Admin dashboard</p>
                <h2>Ruang kerja admin siap digunakan.</h2>
                <p>Gunakan panel ini sebagai pusat pengelolaan website. Modul konten dapat ditambahkan di area ini sesuai kebutuhan operasional.</p>
            </section>
        </main>
    </div>
</body>
</html>