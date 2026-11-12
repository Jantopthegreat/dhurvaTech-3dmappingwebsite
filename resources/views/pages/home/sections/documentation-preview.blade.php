
<section
    class="documentation-section"
    id="documentation"
    style="--documentation-bg: url('{{ asset($documentation['background_image']) }}')"
>
    {{-- Section Heading --}}
    <div class="documentation-heading">
        <div class="container">
            <h2>Dokumentasi</h2>
        </div>
    </div>

    <div class="documentation-content">
        <div class="container">
            <div class="documentation-videos">

                @foreach($documentation['videos'] as $video)

                    <article class="documentation-video-row reveal">

                        {{-- Video Placeholder / Player --}}
                        <div class="documentation-video-media">

                            @if(!empty($video['embed_url']))

                                <iframe
                                    src="{{ $video['embed_url'] }}"
                                    title="{{ $video['title'] }}"
                                    loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                ></iframe>

                            @elseif(!empty($video['video_path']))

                                <video controls preload="metadata">
                                    <source
                                        src="{{ asset($video['video_path']) }}"
                                        type="video/mp4"
                                    >
                                    Browser kamu tidak mendukung pemutaran video.
                                </video>

                            @else

                                <div class="documentation-video-placeholder">
                                    <span class="documentation-play-icon">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M8 5.5L19 12L8 18.5V5.5Z"
                                                  fill="currentColor"/>
                                        </svg>
                                    </span>

                                    <span class="documentation-placeholder-label">
                                        Video Documentation
                                    </span>
                                </div>

                            @endif

                        </div>

                        {{-- Video Description --}}
                        <div class="documentation-video-copy">

                            <span class="documentation-eyebrow">
                                VIDEO DOCUMENTATION
                            </span>

                            <h3>{{ $video['title'] }}</h3>

                            <p>{{ $video['description'] }}</p>

                        </div>

                    </article>

                @endforeach

            </div>
            <div class="documentation-gallery-grid">

                @foreach($documentation['galleries'] as $galleryKey => $gallery)

                    <div
                        class="documentation-gallery"
                        data-documentation-carousel
                        data-interval="1000"
                    >

                        {{-- Gallery Heading --}}
                        <div class="documentation-gallery-heading">
                            <h3>{{ $gallery['title'] }}</h3>
                        </div>

                        {{-- Gallery Slider --}}
                        <div class="documentation-gallery-viewport">

                            <div class="documentation-gallery-track">

                                @foreach($gallery['photos'] as $photo)

                                    <div
                                        class="documentation-photo-slide {{ $loop->first ? 'is-active' : '' }}"
                                        data-documentation-slide
                                        aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
                                    >

                                        @if(file_exists(public_path($photo['image'])))

                                            <img
                                                src="{{ asset($photo['image']) }}"
                                                alt="{{ $photo['alt'] }}"
                                                loading="lazy"
                                            >

                                        @else

                                            <div class="documentation-photo-placeholder">
                                                <svg
                                                    viewBox="0 0 24 24"
                                                    aria-hidden="true"
                                                >
                                                    <rect
                                                        x="3"
                                                        y="3"
                                                        width="18"
                                                        height="18"
                                                        rx="2"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                    <circle
                                                        cx="8.5"
                                                        cy="8.5"
                                                        r="1.5"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M21 15L16 10L5 21"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                </svg>

                                                <span>Photo Placeholder</span>
                                            </div>

                                        @endif

                                    </div>

                                @endforeach

                            </div>

                        </div>

                        {{-- Gallery Indicators --}}
                        <div class="documentation-gallery-dots">

                            @foreach($gallery['photos'] as $index => $photo)

                                <button
                                    type="button"
                                    class="documentation-gallery-dot {{ $loop->first ? 'is-active' : '' }}"
                                    data-documentation-dot="{{ $index }}"
                                    aria-label="Tampilkan foto {{ $index + 1 }}"
                                    aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                ></button>

                            @endforeach

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Documentation Description --}}
            <div class="documentation-footer-copy reveal">
                <p>{{ $documentation['description'] }}</p>
            </div>

        </div>
    </div>

</section>
