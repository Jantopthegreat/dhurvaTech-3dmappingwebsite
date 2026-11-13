
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
{{-- Automatic Image Slider --}}
<x-service-slider :slides="$serviceSlides" />

            </div>
        </div>

    </section>
