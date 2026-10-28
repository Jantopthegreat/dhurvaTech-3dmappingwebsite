<section class="section section-projects" id="projects">
    <div class="container">
        <div class="section-heading section-heading-row reveal">
            <div><p class="eyebrow">SELECTED WORK</p><h2 class="section-title">Projects & Applications</h2></div>
            <p class="section-heading-aside standalone">Sample project cards are included for layout testing and should be replaced with approved project records.</p>
        </div>
        <div class="project-grid reveal">
            @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    </div>
</section>
