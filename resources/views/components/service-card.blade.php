@props(['service'])
<article class="service-card">
    <a class="card-image-link" href="{{ route('services.show', $service['slug']) }}" aria-label="View {{ $service['title'] }} service">
        <img class="card-image" src="{{ asset($service['image'] ?? 'images/services/service-placeholder.svg') }}" alt="{{ $service['title'] }} illustration" loading="lazy">
    </a>
    <div class="service-card-body reveal">
        <p class="eyebrow">JST SERVICE</p>
        <h3><a href="{{ route('services.show', $service['slug']) }}">{{ $service['title'] }}</a></h3>
        <p>{{ $service['short_description'] }}</p>
        <a class="text-link" href="{{ route('services.show', $service['slug']) }}">Explore service <span aria-hidden="true">→</span></a>
    </div>
</article>
