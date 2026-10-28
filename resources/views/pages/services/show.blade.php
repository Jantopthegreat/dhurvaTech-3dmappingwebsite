@extends('layouts.app')

@section('title', $service['title'] . ' | ' . config('jst.brand.name'))
@section('meta_description', $service['short_description'])

@section('content')
    <section class="detail-hero"><div class="container detail-hero-grid hero-enter"><div><a class="back-link" href="{{ route('services.index') }}">← All services</a><p class="eyebrow eyebrow-light">JST SERVICE</p><h1>{{ $service['title'] }}</h1><p class="detail-lead">{{ $service['short_description'] }}</p><a class="button button-accent" href="{{ route('contact') }}">Discuss a project <span aria-hidden="true">↗</span></a></div><img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }} placeholder image"></div></section>
    <section class="section"><div class="container detail-content-grid reveal"><div><p class="eyebrow">OVERVIEW</p><h2 class="section-title">A solution built around your site requirements</h2><p class="section-description">{{ $service['description'] }}</p></div><div class="content-panel"><h2>Potential deliverables</h2><ul class="check-list">@foreach($service['highlights'] as $highlight)<li>{{ $highlight }}</li>@endforeach</ul><p class="small-note">Final outputs and technical specifications must be confirmed with JST.</p></div></div></section>
    <section class="section section-muted"><div class="container reveal"><div class="section-heading section-heading-row"><div><p class="eyebrow">KEEP EXPLORING</p><h2 class="section-title">Related services</h2></div><a class="text-link" href="{{ route('services.index') }}">All services <span aria-hidden="true">→</span></a></div><div class="service-grid">@foreach($relatedServices as $related)<x-service-card :service="$related" />@endforeach</div></div></section>
@endsection
