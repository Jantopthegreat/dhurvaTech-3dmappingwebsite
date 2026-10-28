<?php

namespace App\Repositories;

/** Sample portfolio items. Replace with real project records or API data later. */
class ProjectRepository
{
    public function all(): array
    {
        return [
            [
                'title' => 'Topographic Site Survey',
                'category' => 'Topography',
                'location' => 'Project location to be confirmed',
                'description' => 'Sample project card for a topographic survey and terrain representation.',
                'image' => 'images/projects/project-topography-placeholder.svg',
            ],
            [
                'title' => 'Waterbody Mapping',
                'category' => 'Bathymetry',
                'location' => 'Project location to be confirmed',
                'description' => 'Sample project card for underwater terrain and depth mapping.',
                'image' => 'images/projects/project-bathymetry-placeholder.svg',
            ],
            [
                'title' => 'Infrastructure Documentation',
                'category' => '3D Mapping',
                'location' => 'Project location to be confirmed',
                'description' => 'Sample project card for digital site documentation and 3D data capture.',
                'image' => 'images/projects/project-infrastructure-placeholder.svg',
            ],
        ];
    }
}
