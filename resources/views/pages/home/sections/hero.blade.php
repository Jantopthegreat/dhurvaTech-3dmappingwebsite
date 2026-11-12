
<section
    class="hero-section"
    style="--hero-image: url('{{ asset($hero['image']) }}')"
>
    <div class="hero-overlay"></div>

    <div class="container hero-layout">
        <div class="hero-copy">

            {{-- Main title --}}
            <h1 class="hero-enter">
                {{ $hero['title'] }}
            </h1>

            {{-- Description --}}
            <div class="hero-description hero-enter hero-enter-delay-2">
                <p>{{ $hero['description'] }}</p>
            </div>

        </div>
    </div>
</section>
