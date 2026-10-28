@props(['product'])
<article class="product-card">
    <a class="product-image-wrap" href="{{ route('store.show', $product['slug']) }}" aria-label="View {{ $product['name'] }}">
        <img src="{{ asset($product['image'] ?? 'images/products/product-placeholder.svg') }}" alt="{{ $product['name'] }} illustration" loading="lazy">
        <span class="product-image-badge">Sample item</span>
    </a>
    <div class="product-card-body reveal">
        <p class="eyebrow">{{ $product['category'] }}</p>
        <h3><a href="{{ route('store.show', $product['slug']) }}">{{ $product['name'] }}</a></h3>
        <p>{{ $product['description'] }}</p>
        <div class="product-card-bottom">
            <span class="availability-label">{{ $product['availability'] }}</span>
            <a class="icon-link" href="{{ route('store.show', $product['slug']) }}" aria-label="View product details">↗</a>
        </div>
    </div>
</article>
