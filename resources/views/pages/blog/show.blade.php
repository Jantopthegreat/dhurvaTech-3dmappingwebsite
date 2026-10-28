@extends('layouts.app')

@section('title', $article['title'] . ' | JST Blog')
@section('meta_description', $article['excerpt'])

@section('content')
    <article class="article-detail">
        <header class="article-detail-header container hero-enter"><a class="back-link" href="{{ route('blog.index') }}">← Back to blog</a><p class="eyebrow">{{ $article['category'] }}</p><h1>{{ $article['title'] }}</h1><div class="article-meta"><span>{{ \Illuminate\Support\Carbon::parse($article['published_at'])->format('d M Y') }}</span><span>{{ $article['read_time'] }}</span></div></header>
        <div class="article-detail-image container"><img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }} placeholder"></div>
        <div class="article-body container"><p class="article-lead">{{ $article['excerpt'] }}</p>@foreach($article['content'] as $paragraph)<p>{{ $paragraph }}</p>@endforeach<div class="article-demo-notice">This is sample editorial content for development. Replace it with client-approved copy before publishing.</div><a class="text-link" href="{{ route('blog.index') }}">← More articles</a></div>
    </article>
@endsection
