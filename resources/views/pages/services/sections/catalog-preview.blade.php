
@php
    $whatsappNumber = preg_replace(
        '/\D+/',
        '',
        config('cakrawala.contact.whatsapp', '')
    );
@endphp

<section class="service-catalog-preview">

    {{-- Orange Heading --}}
    <div class="service-catalog-heading">
        <div class="container">
            <h2>Sewa &amp; Jual Beli Alat</h2>
        </div>
    </div>

    <div class="container">

        {{-- Horizontal Product List --}}
        <div class="service-catalog-track">

            @forelse($catalogProducts as $product)

                <article class="service-catalog-card">

                    <a
                        href="{{ route('store.show', $product['slug']) }}"
                        class="service-catalog-image"
                        aria-label="Lihat {{ $product['name'] }}"
                    >
                        <img
                            src="{{ asset($product['image'] ?? 'images/products/product-placeholder.svg') }}"
                            alt="{{ $product['name'] }}"
                            loading="lazy"
                        >

                        <span class="service-catalog-badge">
                            {{ ($product['type'] ?? '') === 'rent'
                                ? 'Sewa'
                                : ((($product['type'] ?? '') === 'sale') ? 'Jual' : 'Produk') }}
                        </span>
                    </a>

                    <div class="service-catalog-card-body">

                        <h3>{{ $product['name'] }}</h3>

                        <p class="service-catalog-category">
                            <strong>Jenis:</strong>
                            {{ $product['category'] }}
                        </p>

                        <p class="service-catalog-description">
                            {{ $product['description'] }}
                        </p>

                        <strong class="service-catalog-price">
                            {{ $product['price_label'] ?? $product['availability'] ?? 'Hubungi Kami' }}
                        </strong>

                        <a
                            href="https://wa.me/{{ $whatsappNumber }}?text={{ rawurlencode('Halo, saya tertarik dengan produk ' . $product['name'] . '. Mohon informasi lebih lanjut.') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="service-catalog-order"
                        >
                            Order Here
                            <span aria-hidden="true">›</span>
                        </a>

                    </div>

                </article>

            @empty

                <p class="service-catalog-empty">
                    Produk katalog belum tersedia.
                </p>

            @endforelse

        </div>

        {{-- Description --}}
        <div class="service-catalog-description-bottom">

            <p>
                Selain menyediakan jasa konsultan survei, Cakrawala
                Geosurvey juga melayani penyewaan dan jual beli berbagai
                instrumen pemetaan geospasial berkualitas tinggi.
                Seluruh peralatan kami telah terkalibrasi dan siap
                diandalkan untuk menunjang kelancaran teknis
                operasional di lapangan.
            </p>

            <a
                href="{{ route('store.index') }}"
                class="service-catalog-button"
            >
                Katalog Jual Beli
            </a>

        </div>

    </div>

</section>
