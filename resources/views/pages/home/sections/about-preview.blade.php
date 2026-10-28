<section class="section section-about" id="about-preview">
    <div class="container about-grid reveal">
        <div class="about-image-frame">
            <img src="{{ asset($aboutPreview['image']) }}" alt="JST team and mapping workflow placeholder" loading="lazy">
            <div class="image-note"><span class="note-mark">JST</span><span>Technology for spatial understanding</span></div>
        </div>
        <div class="about-copy reveal">
            <p class="eyebrow">{{ $aboutPreview['eyebrow'] }}</p>
            <h2 class="section-title">{{ $aboutPreview['title'] }}</h2>
            <p class="section-description">{{ $aboutPreview['description'] }}</p>
            <div class="stat-row">
                @foreach($aboutPreview['stats'] as $stat)
                    <div class="stat-item"><strong>{{ $stat['value'] }}</strong><span>{{ $stat['label'] }}</span></div>
                @endforeach
            </div>
            <a class="button button-dark" href="{{ route('about') }}">Discover JST <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
