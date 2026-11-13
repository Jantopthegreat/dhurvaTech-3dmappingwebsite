
@props(['product'])

<article class="product-card">

    <a
        class="product-image-wrap"
        href="{{ route('store.show', $product['slug']) }}"
        aria-label="Lihat {{ $product['name'] }}"
    >
        <img
            src="{{ asset($product['image'] ?? 'images/products/product-placeholder.svg') }}"
            alt="{{ $product['name'] }}"
            loading="lazy"
        >

        <span class="product-image-badge">
            {{ $product['type'] === 'rent' ? 'Sewa' : 'Jual' }}
        </span>
    </a>

    <div class="product-card-body">

        <h3>
            {{ $product['name'] }}
        </h3>

        <p class="product-category">
            <strong>Jenis:</strong> {{ $product['category'] }}
        </p>

        <p class="product-description">
            {{ $product['description'] }}
        </p>

        <div class="product-card-bottom">

            <strong class="product-price">
                {{ $product['price_label'] ?? $product['availability'] }}
            </strong>

            <a
                class="product-order-link"
                href="{{ route('store.show', $product['slug']) }}"
            >
                Lihat Detail <span aria-hidden="true">›</span>
            </a>

        </div>

    </div>

</article>
