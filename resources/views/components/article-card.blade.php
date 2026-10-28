@props(['article'])
<article class="article-card">
    <a class="card-image-link" href="{{ route('blog.show', $article['slug']) }}" aria-label="Read {{ $article['title'] }}">
        <img class="card-image" src="{{ asset($article['image'] ?? 'images/blog/article-placeholder.svg') }}" alt="{{ $article['title'] }} illustration" loading="lazy">
    </a>
    <div class="article-card-body reveal">
        <div class="article-meta"><span>{{ $article['category'] }}</span><span>{{ $article['read_time'] }}</span></div>
        <h3><a href="{{ route('blog.show', $article['slug']) }}">{{ $article['title'] }}</a></h3>
        <p>{{ $article['excerpt'] }}</p>
        <a class="text-link" href="{{ route('blog.show', $article['slug']) }}">Read article <span aria-hidden="true">→</span></a>
    </div>
</article>
