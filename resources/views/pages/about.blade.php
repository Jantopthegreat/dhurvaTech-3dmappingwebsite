@extends('layouts.app')

@section('title', 'About Us | ' . config('jst.brand.name'))
@section('meta_description', 'Learn about DHURVA TECH ANGKASA RAYA and its surveying and mapping approach.')

@section('content')
    <section class="page-hero page-hero-compact">
        <div class="container page-hero-content hero-enter"><p class="eyebrow eyebrow-light">{{ $about['eyebrow'] }}</p><h1>{{ $about['title'] }}</h1><p>{{ $about['intro'] }}</p></div>
        <div class="page-hero-image hero-enter-delay 1"><img src="{{ asset($about['image']) }}" alt="DTAR about us placeholder"></div>
    </section>

    <section class="section">
        <div class="container two-column-content reveal">
            <div><p class="eyebrow">OUR PURPOSE</p><h2 class="section-title">{{ $about['mission_title'] }}</h2><p class="section-description">{{ $about['mission'] }}</p></div>
            <div class="content-panel"><p class="eyebrow">WHERE WE WANT TO GO</p><h2 class="section-title">{{ $about['vision_title'] }}</h2><p class="section-description">{{ $about['vision'] }}</p></div>
        </div>
    </section>

    <section class="section section-muted reveal">
        <div class="container"><div class="section-heading"><p class="eyebrow">HOW WE WORK</p><h2 class="section-title">Principles behind every project</h2></div>
            <div class="value-grid">
                @foreach($about['values'] as $value)
                    <article class="value-card"><span class="value-index">0{{ $loop->iteration }}</span><h3>{{ $value['title'] }}</h3><p>{{ $value['description'] }}</p></article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
