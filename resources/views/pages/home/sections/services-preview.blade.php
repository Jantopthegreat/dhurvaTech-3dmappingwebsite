<section class="section section-muted" id="services">
    <div class="container">
        <div class="section-heading section-heading-row reveal">
            <div><p class="eyebrow">WHAT WE DO</p><h2 class="section-title">Our Services</h2></div>
            <div class="section-heading-aside"><p>From aerial capture to detailed 3D deliverables, explore the service areas prepared for JST.</p><a class="text-link" href="{{ route('services.index') }}">View all services <span aria-hidden="true">→</span></a></div>
        </div>
        <div class="service-grid reveal">
            @foreach($services as $service)
                <x-service-card :service="$service" />
            @endforeach
        </div>
        <div class="center-action"><a class="button button-primary" href="{{ route('services.index') }}">Explore all 8 services <span aria-hidden="true">↗</span></a></div>
    </div>
</section>
