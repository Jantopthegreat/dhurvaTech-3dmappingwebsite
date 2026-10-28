@extends('layouts.app')

@section('title', 'Services | ' . config('jst.brand.name'))
@section('meta_description', 'Explore JST surveying, mapping, LiDAR, bathymetry, and 3D service categories.')

@section('content')
    <section class="page-hero page-hero-simple"><div class="container page-hero-content hero-enter"><p class="eyebrow eyebrow-light">OUR EXPERTISE</p><h1>Surveying and mapping services</h1><p>Explore the service categories. Each detail page uses sample content and a local image placeholder that can be replaced later.</p></div></section>
    <section class="section"><div class="container reveal"><div class="service-grid service-grid-large">
        @foreach($services as $service)
            <x-service-card :service="$service" />
        @endforeach
    </div></div></section>
@endsection
