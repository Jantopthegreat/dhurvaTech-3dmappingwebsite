
@extends('layouts.app')

@section('title', 'Layanan | ' . config('cakrawala.brand.name'))
@section('meta_description', 'Jelajahi layanan survei, pemetaan, LiDAR, bathymetry, dan pemodelan 3D Cakrawala Geosurvey.')

@section('content')

    <main class="services-page">

        {{-- Page Heading --}}
        <div class="home-services-heading services-page-heading">
            <div class="container">
                <h2>Layanan</h2>
            </div>
        </div>

        <div class="services-page-content">
            <div class="container">

                {{-- Service Image Carousel --}}
                <div class="services-page-carousel">
                    <x-service-slider :slides="$serviceSlides" />
                </div>

                {{-- Service Explanations --}}
                @include('pages.services.sections.service-descriptions')

                {{-- Contact CTA --}}
                @include('pages.services.sections.contact-cta')

            </div>
        </div>

    </main>

@endsection
