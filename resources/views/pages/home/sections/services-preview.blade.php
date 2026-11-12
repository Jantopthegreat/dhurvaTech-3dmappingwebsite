
<section class="home-services" id="services">

    {{-- Section Heading --}}
    <div class="home-services-heading">
        <div class="container">
            <h2>Layanan</h2>
        </div>
    </div>

    <div class="home-services-content">
        <div class="container">

            {{-- Section Introduction --}}
            <div class="home-services-intro">

                <p>
                    Kami menawarkan berbagai layanan pemetaan dan
                    survei komprehensif yang didukung oleh tenaga ahli
                    dan teknologi terkini untuk memastikan akurasi
                    data proyek Anda.
                </p>

                <a href="{{ route('services.index') }}"
                   class="home-services-button">
                    Layanan
                </a>

            </div>

            {{-- Automatic Image Slider --}}
            <div
                class="home-service-slider"
                data-service-slider
                data-interval="1000"
                aria-label="Layanan unggulan"
            >

                <div class="home-service-slider-track">

                    @foreach($serviceSlides as $index => $slide)

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
                                    href="{{ route('services.show', $slide['slug']) }}"
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

                {{-- Slider Indicators --}}
                <div class="home-service-slider-dots">

                    @foreach($serviceSlides as $index => $slide)

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

        </div>
    </div>

</section>
