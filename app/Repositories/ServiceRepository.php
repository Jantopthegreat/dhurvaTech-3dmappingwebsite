<?php

namespace App\Repositories;

/** Static service data for the initial frontend skeleton. */
class ServiceRepository
{
    public function all(): array
    {
        return [
            [
                'slug' => 'survey-drone',
                'title' => 'Drone Survey',
                'short_description' => 'Efficient aerial data capture for large or difficult-to-access areas.',
                'description' => 'Drone surveying uses aerial platforms and specialized sensors to capture current, high-resolution information about a site. Final deliverables depend on the approved scope and required accuracy.',
                'image' => 'images/services/survey-drone-placeholder.svg',
                'highlights' => ['Aerial data acquisition', 'Orthomosaic and elevation products', 'Support for site planning'],
            ],
            [
                'slug' => 'bathymetry',
                'title' => 'Bathymetry',
                'short_description' => 'Understand underwater terrain, depths, and submerged features.',
                'description' => 'Bathymetric surveying helps map the underwater surface of rivers, lakes, reservoirs, and coastal environments. This sample page is ready for project images and client-approved technical specifications.',
                'image' => 'images/services/bathymetry-placeholder.svg',
                'highlights' => ['Water-depth data capture', 'Underwater terrain representation', 'Planning and monitoring support'],
            ],
            [
                'slug' => 'construction',
                'title' => 'Construction',
                'short_description' => 'Visual site data for planning, progress checks, and documentation.',
                'description' => 'Surveying and mapping can help construction teams compare site conditions, communicate progress, and maintain a current spatial record throughout a project.',
                'image' => 'images/services/construction-placeholder.svg',
                'highlights' => ['Site documentation', 'Progress monitoring', 'As-built information support'],
            ],
            [
                'slug' => 'lidar',
                'title' => 'LiDAR',
                'short_description' => 'Capture dense 3D point-cloud data for detailed spatial analysis.',
                'description' => 'LiDAR uses laser measurements to capture the shape of surfaces and objects. Depending on the platform and environment, the resulting point cloud can support terrain modelling, asset mapping, and engineering workflows.',
                'image' => 'images/services/lidar-placeholder.svg',
                'highlights' => ['3D point-cloud capture', 'Terrain and feature extraction', 'Detailed spatial analysis'],
            ],
            [
                'slug' => 'topography',
                'title' => 'Topography',
                'short_description' => 'Map terrain, contours, and ground features for project planning.',
                'description' => 'Topographic surveys describe the position and elevation of ground features. The information can be used as a reference for planning, design, infrastructure, and land-development activities.',
                'image' => 'images/services/topography-placeholder.svg',
                'highlights' => ['Contour and elevation mapping', 'Ground-feature documentation', 'Planning-ready map outputs'],
            ],
            [
                'slug' => '3d-scanning',
                'title' => '3D Scanning',
                'short_description' => 'Create detailed digital representations of physical spaces and objects.',
                'description' => '3D scanning captures the geometry of existing spaces, structures, or objects and translates it into digital spatial data for documentation, inspection, and design workflows.',
                'image' => 'images/services/3d-scanning-placeholder.svg',
                'highlights' => ['Existing-condition capture', 'Point clouds and spatial records', 'Support for design and inspection'],
            ],
            [
                'slug' => '3d-model',
                'title' => '3D Model',
                'short_description' => 'Turn spatial data into clear and useful three-dimensional models.',
                'description' => '3D modelling transforms captured or supplied data into digital representations that are easier to inspect, communicate, and use in planning and presentation workflows.',
                'image' => 'images/services/3d-model-placeholder.svg',
                'highlights' => ['Three-dimensional visualization', 'Digital site representation', 'Support for presentations and analysis'],
            ],
            [
                'slug' => 'design-architecture',
                'title' => 'Design Architecture',
                'short_description' => 'Connect site information with architectural and spatial design.',
                'description' => 'Architecture and design workflows benefit from an accurate understanding of site conditions. This service page is prepared for the client’s final description, sample work, and project-specific deliverables.',
                'image' => 'images/services/design-architecture-placeholder.svg',
                'highlights' => ['Site-context visualization', 'Design coordination support', 'Presentation-ready material'],
            ],
        ];
    }

    public function findBySlug(string $slug): ?array
    {
        foreach ($this->all() as $service) {
            if ($service['slug'] === $slug) {
                return $service;
            }
        }

        return null;
    }
}
