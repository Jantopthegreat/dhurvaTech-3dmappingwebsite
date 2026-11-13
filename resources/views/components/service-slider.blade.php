
<div
    class="home-service-slider"
    data-service-slider
    data-interval="2000"
    aria-label="Layanan unggulan"
>
    <div class="home-service-slider-track">

        @foreach($slides as $index => $slide)
            <div
                class="home-service-slide {{ $loop->first ? 'is-active' : '' }}"
                data-service-slide
                aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
            >
                <img
                    src="{{ asset($slide['image']) }}"
                    alt="{{ $slide['alt'] }}"
                    loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                >

                <div class="home-service-slide-overlay"></div>

                <div class="home-service-slide-content">
                    <h3>{{ $slide['title'] }}</h3>

                    <a
                        href="{{ route('services.index') }}"
                        class="home-service-slide-link"
                        tabindex="{{ $loop->first ? '0' : '-1' }}"
                    >
                        Lihat Layanan
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    <div class="home-service-slider-dots">
        @foreach($slides as $index => $slide)
            <button
                type="button"
                class="home-service-dot {{ $loop->first ? 'is-active' : '' }}"
                data-service-dot="{{ $index }}"
                aria-label="Tampilkan {{ $slide['title'] }}"
                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
            ></button>
        @endforeach
    </div>
</div>
