<section class="section section-muted" id="latest-articles">
    <div class="container">
        <div class="section-heading section-heading-row reveal">
            <div><p class="eyebrow">JST INSIGHTS</p><h2 class="section-title">Latest Articles</h2></div>
            <a class="text-link" href="{{ route('blog.index') }}">Visit the blog <span aria-hidden="true">→</span></a>
        </div>
        <div class="article-grid reveal">
            @foreach($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
