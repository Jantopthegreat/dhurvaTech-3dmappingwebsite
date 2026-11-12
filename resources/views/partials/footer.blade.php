
<footer class="site-footer">
    <div class="container footer-main">

        {{-- Brand Information --}}
        <div class="footer-brand-block">
            <a class="footer-brand-title" href="{{ route('home') }}">
                {{ strtoupper(config('cakrawala.brand.name', 'Cakrawala Geosurvey')) }}
            </a>

            <p class="footer-description">
                Tetap terhubung dengan kami untuk mendapatkan informasi terbaru seputar
                layanan survei, pemetaan, serta pembaruan proyek dari Cakrawala Geosurvey.
            </p>

            {{-- Social Media --}}
            <div class="footer-socials">

                <a href="{{ config('cakrawala.social.facebook', '#') }}"
                   aria-label="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.03 1.792-4.704 4.533-4.704 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.49 0-1.956.93-1.956 1.885v2.273h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
                    </svg>
                </a>

                <a href="{{ config('cakrawala.social.instagram', '#') }}"
                   aria-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-width="2"
                              d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Z"/>
                        <circle cx="12" cy="12" r="4" fill="none"
                                stroke="currentColor" stroke-width="2"/>
                        <circle cx="18" cy="6" r="1.2" fill="currentColor"/>
                    </svg>
                </a>

                <a href="{{ config('cakrawala.social.twitter', '#') }}"
                   aria-label="Twitter">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M23.953 4.57a10 10 0 0 1-2.825.775 4.932 4.932 0 0 0 2.163-2.723 9.99 9.99 0 0 1-3.127 1.195 4.916 4.916 0 0 0-8.384 4.482A13.94 13.94 0 0 1 1.64 2.162a4.916 4.916 0 0 0 1.523 6.56 4.9 4.9 0 0 1-2.229-.616v.062a4.92 4.92 0 0 0 3.946 4.818 4.93 4.93 0 0 1-2.224.084 4.927 4.927 0 0 0 4.6 3.419A9.87 9.87 0 0 1 . 20.54a13.93 13.93 0 0 0 7.548 2.213c9.057 0 14.01-7.503 14.01-14.01 0-.213-.005-.425-.014-.636a10 10 0 0 0 2.46-2.548z"/>
                    </svg>
                </a>

            </div>
        </div>

        {{-- Company Information --}}
        <div class="footer-column">
            <h2>Info Kami</h2>

            <a href="{{ route('blog.index') }}">Dokumentasi</a>
            <a href="{{ route('about') }}">Jejak Mitra</a>
            <a href="{{ route('services.index') }}">Layanan</a>
            <a href="{{ route('contact') }}">Hubungi Kami</a>
        </div>

        {{-- Catalog --}}
        <div class="footer-column">
            <h2>Katalog</h2>

            <a href="{{ route('store.index') }}">Sewa</a>
            <a href="{{ route('store.index') }}">Jual Beli</a>
        </div>

    </div>
</footer>
