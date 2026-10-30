@extends('layouts.app')

@section('title', 'Blog | ' . config('jst.brand.name'))
@section('meta_description', 'Articles and insights about surveying, drone mapping, bathymetry, LiDAR, and 3D models.')

@section('content')
    <section class="blog-hero">
        <div class="container blog-hero-inner hero-enter">
            <div>
                <p class="eyebrow eyebrow-light">DTAR INSIGHTS</p>
                <h1>Ideas, updates, and knowledge</h1>
                <p>Perspektif tentang pemetaan, survei udara, LiDAR, dan teknologi geospasial untuk proyek yang lebih terukur.</p>
            </div>
            <div class="blog-hero-mark" aria-hidden="true"><span>FIELD</span><strong>NOTES</strong><i></i></div>
        </div>
    </section>
    <section class="section blog-index-section">
        <div class="container">
            <div class="blog-section-heading reveal">
                <div><p class="eyebrow">LATEST FROM THE FIELD</p><h2>Catatan terbaru</h2></div>
                <p>{{ count($articles) }} artikel untuk dibaca dan dibagikan.</p>
            </div>
            @if (count($articles))
                <div class="article-grid article-grid-large">
                    @foreach($articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
            @else
                <p class="blog-empty">Belum ada artikel yang dipublikasikan.</p>
            @endif
        </div>
    </section>
@endsection
