<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#082d62">
    <title>@yield('title', 'Terjadi kesalahan') | {{ config('jst.brand.name') }}</title>
    <style>
        :root { color-scheme: light; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: #10233f; background: #f4f8fc; }
        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; }
        .error-shell { display: grid; min-height: 100vh; place-items: center; padding: 28px 20px; background: radial-gradient(circle at 85% 12%, rgba(52, 141, 255, .16), transparent 34%), #f4f8fc; }
        .error-card { width: min(100%, 720px); padding: clamp(32px, 7vw, 76px); border: 1px solid #dce7f3; border-radius: 22px; background: rgba(255,255,255,.94); box-shadow: 0 24px 70px rgba(8,45,98,.1); text-align: center; }
        .error-brand { display: inline-block; margin-bottom: 48px; color: #082d62; font-size: 1.15rem; font-weight: 850; letter-spacing: -.04em; text-decoration: none; }
        .error-brand span { color: #1673d1; }
        .error-code { margin: 0; color: #1673d1; font-size: clamp(4.5rem, 15vw, 8rem); font-weight: 850; letter-spacing: -.09em; line-height: .9; }
        .error-title { margin: 28px 0 12px; color: #10233f; font-size: clamp(1.6rem, 4vw, 2.45rem); letter-spacing: -.04em; }
        .error-message { max-width: 500px; margin: 0 auto; color: #64748b; line-height: 1.7; }
        .error-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-top: 32px; }
        .error-button { display: inline-flex; align-items: center; justify-content: center; min-height: 44px; padding: 0 19px; border: 1px solid #0b438d; border-radius: 7px; background: #0b438d; color: #fff; font-size: .9rem; font-weight: 750; text-decoration: none; transition: background .2s ease, transform .2s ease; }
        .error-button:hover { background: #1673d1; transform: translateY(-1px); }
        .error-button-secondary { border-color: #d3dfed; background: #fff; color: #0b438d; }
        .error-button-secondary:hover { border-color: #a9c5e5; background: #f4f8fc; }
    </style>
</head>
<body>
    <main class="error-shell">
        <section class="error-card" aria-labelledby="error-title">
            <a class="error-brand" href="{{ url('/') }}">Cakrawala<span>Geosurvey</span></a>
            <p class="error-code">@yield('code')</p>
            <h1 class="error-title" id="error-title">@yield('heading')</h1>
            <p class="error-message">@yield('message')</p>
            <div class="error-actions">
                <a class="error-button" href="{{ url('/') }}">Kembali ke beranda</a>
            </div>
        </section>
    </main>
</body>
</html>
