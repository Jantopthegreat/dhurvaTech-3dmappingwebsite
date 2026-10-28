@props(['project'])
<article class="project-card">
    <div class="project-image-wrap">
        <img src="{{ asset($project['image'] ?? 'images/projects/project-placeholder.svg') }}" alt="{{ $project['title'] }} illustration" loading="lazy">
        <span class="project-category">{{ $project['category'] }}</span>
    </div>
    <div class="project-card-body reveal">
        <p class="muted-label">{{ $project['location'] }}</p>
        <h3>{{ $project['title'] }}</h3>
        <p>{{ $project['description'] }}</p>
    </div>
</article>
