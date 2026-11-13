<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | {{ config('jst.brand.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    <main class="admin-login-shell">
        <section class="admin-login-card" aria-labelledby="login-title">
            <a class="admin-brand" href="{{ route('home') }}">Dhurva<span>Tech</span></a>
            <p class="admin-kicker">Admin portal</p>
            <h1 id="login-title">Masuk ke dashboard</h1>
            <p class="admin-intro">Kelola konten dan aktivitas website dari satu tempat.</p>

            @if ($errors->any())
                <div class="admin-alert" role="alert">{{ $errors->first() }}</div>
            @endif

            <form class="admin-form" method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <label for="email">Email admin</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>

                <label class="admin-checkbox" for="remember">
                    <input id="remember" name="remember" type="checkbox" value="1">
                    <span>Ingat saya</span>
                </label>

                <button class="admin-button" type="submit">Masuk ke dashboard</button>
            </form>
        </section>
    </main>
</body>
</html>