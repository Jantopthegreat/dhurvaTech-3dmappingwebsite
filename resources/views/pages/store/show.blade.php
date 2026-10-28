@extends('layouts.app')

@section('title', $product['name'] . ' | JST Store')
@section('meta_description', $product['description'])

@section('content')
    <section class="section product-detail-section"><div class="container product-detail-grid"><div class="product-detail-image"><img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }} placeholder"></div><div class="product-detail-copy"><a class="back-link" href="{{ route('store.index') }}">← Back to store</a><p class="eyebrow">{{ $product['category'] }}</p><h1>{{ $product['name'] }}</h1><p class="detail-lead">{{ $product['description'] }}</p><p class="availability-label">{{ $product['availability'] }}</p><p class="small-note">This is a sample product entry. Confirm product specifications and price with the client before publishing.</p>
    @php($whatsappMessage = 'Hello JST, I would like to ask about ' . $product['name'] . '.')
    <a class="button button-primary" href="https://wa.me/{{ preg_replace('/\D+/', '', config('jst.contact.whatsapp')) }}?text={{ rawurlencode($whatsappMessage) }}" target="_blank" rel="noopener noreferrer">Enquire via WhatsApp <span aria-hidden="true">↗</span></a>
    </div></div></section>
@endsection
