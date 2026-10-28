@extends('layouts.app')

@section('title', 'JST Store | ' . config('jst.brand.name'))
@section('meta_description', 'Browse sample JST equipment and products. Product enquiries are handled through WhatsApp.')

@section('content')
    <section class="page-hero page-hero-simple"><div class="container page-hero-content hero-enter"><p class="eyebrow eyebrow-light">JST STORE</p><h1>Equipment for your next project</h1><p>Browse the sample catalogue and contact the team for availability and pricing. Checkout and online payments are not included.</p></div></section>
    <section class="section"><div class="container reveal"><div class="store-intro"><p class="eyebrow">PRODUCT CATALOGUE</p><p>Sample products only. Replace each image, description, and availability status with approved product data.</p></div><div class="product-grid">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div></div></section>
@endsection
