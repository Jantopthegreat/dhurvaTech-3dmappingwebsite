<footer class="site-footer">
    <div class="container footer-main">
        <div class="footer-brand-block">
            <a class="brand brand-footer" href="{{ route('home') }}">
                <img src="{{ asset(config('jst.brand.logo')) }}" alt="{{ config('jst.brand.name') }} logo">
            </a>
            <p>Surveying, mapping, and geospatial information to support clearer project decisions.</p>
        </div>

        <div class="footer-column">
            <h2>Explore</h2>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('services.index') }}">Services</a>
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="{{ route('store.index') }}">Store</a>
        </div>

        <div class="footer-column">
            <h2>Services</h2>
            @foreach(array_slice($navigationServices, 0, 4) as $service)
                <a href="{{ route('services.show', $service['slug']) }}">{{ $service['title'] }}</a>
            @endforeach
        </div>

        <div class="footer-column footer-contact">
            <h2>Contact</h2>
            <a href="mailto:{{ config('jst.contact.email') }}">{{ config('jst.contact.email') }}</a>
            <p>{{ config('jst.contact.address') }}</p>
            <a href="{{ route('contact') }}" class="footer-contact-link">Contact our team <span aria-hidden="true">→</span></a>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <p>© {{ date('Y') }} {{ config('jst.brand.name') }}. All rights reserved.</p>
            <p class="demo-note">Initial frontend skeleton · Sample content</p>
        </div>
    </div>
</footer>
