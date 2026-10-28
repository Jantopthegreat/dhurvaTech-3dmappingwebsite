<section class="hero-section" style="--hero-image: url('{{ asset($hero['image']) }}')">
    <div class="hero-overlay"></div>

    <div class="container hero-layout">
        <div class="hero-copy">

            {{-- 1. Eyebrow --}}
            <p class="eyebrow eyebrow-light hero-enter">
                {{ $hero['eyebrow'] }}
            </p>

            {{-- 2. Main title --}}
            <h1 class="hero-enter hero-enter-delay-1">
                {{ $hero['title'] }}
            </h1>

            {{-- 3. Subtitle --}}
            <p class="hero-subtitle hero-enter hero-enter-delay-2">
                {{ $hero['subtitle'] }}
            </p>

            {{-- 4. Description --}}
            <div class="hero-description hero-enter hero-enter-delay-3">
                <p>{{ $hero['description'] }}</p>
            </div>

            {{-- 5. Action buttons --}}
            <div class="hero-actions hero-enter hero-enter-delay-3">
                <a class="button button-primary" href="{{ route('about') }}">
                    About Us <span aria-hidden="true">↗</span>
                </a>

                <a class="button button-outline-light" href="#services">
                    Our Services <span aria-hidden="true">↓</span>
                </a>

                <a class="button button-accent" href="{{ route('contact') }}">
                    Contact Us <span aria-hidden="true">↗</span>
                </a>
            </div>

            {{-- 6. Placeholder caption --}}
            <p class="placeholder-caption hero-enter hero-enter-delay-3">
                Replace the hero placeholder in
                <code>public/images/hero/</code>
                with the client's approved image.
            </p>
        </div>

        {{-- 7. Feature card on the right --}}
        <aside class="hero-feature-card hero-enter hero-enter-delay-2">
            <img
                src="{{ asset($hero['feature']['image']) }}"
                alt="Mapping equipment illustration"
            >

            <div class="hero-feature-copy">
                <p class="eyebrow">WHY JST</p>

                <h2>{{ $hero['feature']['title'] }}</h2>

                <p>{{ $hero['feature']['description'] }}</p>
            </div>
        </aside>
    </div>

    {{-- 8. Scroll indicator --}}
    <a
        class="scroll-cue hero-enter hero-enter-delay-3"
        href="#about-preview"
    >
        <span class="scroll-cue-dot"></span>
        Scroll to explore
    </a>
</section>