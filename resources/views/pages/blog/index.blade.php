@extends('layouts.app')

@section('title', 'Blog | ' . config('jst.brand.name'))
@section('meta_description', 'Articles and insights about surveying, drone mapping, bathymetry, LiDAR, and 3D models.')

@section('content')
    <section class="page-hero page-hero-simple"><div class="container page-hero-content hero-enter"><p class="eyebrow eyebrow-light">DTAR INSIGHTS</p><h1>Ideas, updates, and knowledge</h1><p>Sample articles for the initial frontend. Later this list can be connected to a CMS or API.</p></div></section>
    <section class="section"><div class="container reveal"><div class="article-grid article-grid-large">
        @foreach($articles as $article)
            <x-article-card :article="$article" />
        @endforeach
    </div></div></section>
@endsection
