@props(['article'])
@php
    $imageUrl = !empty($article['image']) && str_starts_with($article['image'], 'blog/')
        ? \Illuminate\Support\Facades\Storage::disk('public')->url($article['image'])
        : asset($article['image'] ?? 'images/blog/article-placeholder.svg');
@endphp
<article class="article-card">
    <a class="card-image-link" href="{{ route('blog.show', $article['slug']) }}" aria-label="Read {{ $article['title'] }}">
        <img class="card-image" src="{{ $imageUrl }}" alt="{{ $article['title'] }} illustration" loading="lazy">
    </a>
    <div class="article-card-body reveal">
        <div class="article-meta"><span>{{ $article['category'] }}</span><span>{{ \Illuminate\Support\Carbon::parse($article['published_at'])->format('d M Y') }}</span></div>
        <h3><a href="{{ route('blog.show', $article['slug']) }}">{{ $article['title'] }}</a></h3>
        <p>{{ $article['excerpt'] }}</p>
        <a class="text-link" href="{{ route('blog.show', $article['slug']) }}">Read article <span aria-hidden="true">→</span></a>
    </div>
</article>
