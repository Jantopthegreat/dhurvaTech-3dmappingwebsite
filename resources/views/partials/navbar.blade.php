<header class="site-header" data-site-header>
    <div class="container navbar">
        <a class="brand" href="{{ route('home') }}" aria-label="{{ config('jst.brand.name') }} home">
            <img src="{{ asset(config('jst.brand.logo')) }}" alt="{{ config('jst.brand.name') }} logo">
        </a>

        <button class="mobile-menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-menu-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" aria-label="Main navigation" data-main-nav>
            <a class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}" href="{{ route('about') }}">About Us</a>

            <details class="nav-dropdown {{ request()->routeIs('services.*') ? 'is-current' : '' }}">
                <summary class="nav-link">Services <span class="chevron" aria-hidden="true">⌄</span></summary>
                <div class="dropdown-menu">
                    <a href="{{ route('services.index') }}" class="dropdown-all">All Services</a>
                    @foreach($navigationServices as $service)
                        <a href="{{ route('services.show', $service['slug']) }}">{{ $service['title'] }}</a>
                    @endforeach
                </div>
            </details>

            <a class="nav-link {{ request()->routeIs('blog.*') ? 'is-active' : '' }}" href="{{ route('blog.index') }}">Blog</a>
            <a class="nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}" href="{{ route('contact') }}">Contact</a>
            <a class="nav-store" href="{{ route('store.index') }}">JST Store <span aria-hidden="true">↗</span></a>
        </nav>
    </div>
</header>
