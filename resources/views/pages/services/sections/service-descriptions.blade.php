
<section class="service-descriptions" aria-label="Penjelasan layanan">

    @foreach($services as $service)

        <article
            class="service-description-item {{ $loop->even ? 'is-right' : 'is-left' }} reveal"
            id="service-{{ $service['slug'] }}"
        >

            <h2 class="service-description-title">
                {{ $service['title'] }}
            </h2>

            <div class="service-description-content">
                <p>{{ $service['description'] }}</p>
            </div>

        </article>

    @endforeach

</section>
