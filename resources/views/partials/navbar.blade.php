
<header class="site-header" data-site-header>
    <div class="container navbar">

        {{-- Brand Logo --}}
        <a
            class="brand"
            href="{{ route('home') }}"
            aria-label="{{ config('cakrawala.brand.name') }} home"
        >
            <img
                src="{{ asset(config('cakrawala.brand.logo')) }}"
                alt="{{ config('cakrawala.brand.name') }} logo"
            >
        </a>

        {{-- Mobile Menu Button --}}
        <button
            class="mobile-menu-toggle"
            type="button"
            aria-label="Open navigation"
            aria-expanded="false"
            data-menu-toggle
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        {{-- Main Navigation --}}
        <nav class="main-nav" aria-label="Main navigation" data-main-nav>

            <a
                class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}"
                href="{{ route('home') }}"
            >
                Beranda
            </a>

            <details class="nav-dropdown {{ request()->routeIs('services.*') ? 'is-current' : '' }}">
                <summary class="nav-link {{ request()->routeIs('services.*') ? 'is-active' : '' }}">
                    Layanan
                </summary>

                <div class="dropdown-menu">
                    <a href="{{ route('services.index') }}">
                        Semua Layanan
                    </a>

                    @foreach($navigationServices as $service)
                        <a href="{{ route('services.show', $service['slug']) }}">
                            {{ $service['title'] }}
                        </a>
                    @endforeach
                </div>
            </details>

            <a
                class="nav-link {{ request()->routeIs('store.*') ? 'is-active' : '' }}"
                href="{{ route('store.index') }}"
            >
                Katalog
            </a>

        </nav>
    </div>
</header>
