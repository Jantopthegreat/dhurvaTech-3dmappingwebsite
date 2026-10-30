<?php

namespace App\Repositories;

/**
 * Temporary content source for static pages.
 * Replace these methods with API-backed data when the client API is ready.
 */
class PageContentRepository
{
    public function homeHero(): array
    {
        return [
            'eyebrow' => 'DHURVA TECH ANGKASA RAYA',
            'title' => 'Leading on 3D Mapping Solution',
            'subtitle' => 'See the world from every dimension.',
            'description' => 'We deliver accurate and professional mapping solutions for different industries using modern surveying technology, drone-based platforms, and geospatial data.',
            'image' => 'images/hero/lidar-mapping.png',
            'feature' => [
                'image' => 'images/hero/hero-feature-placeholder.svg',
                'title' => 'Accurate Data for Every Project',
                'description' => 'Modern mapping solutions to support analysis, planning, and better decision-making.',
            ],
        ];
    }

    public function homeAboutPreview(): array
    {
        return [
            'eyebrow' => 'WHO WE ARE',
            'title' => 'Mapping reality. Enabling better decisions.',
            'description' => 'Dhurva Tech Angkasa Raya provides surveying, mapping, and spatial-data solutions to help organizations understand places, assets, and projects with greater clarity.',
            'image' => 'images/about/foto-drone.jpg',
            'stats' => [
                ['value' => '08', 'label' => 'Service categories'],
                ['value' => '3D', 'label' => 'Mapping perspective'],
                ['value' => 'Data', 'label' => 'Driven approach'],
            ],
        ];
    }

    public function aboutPage(): array
    {
        return [
            'eyebrow' => 'ABOUT DHURVA TECH ANGKASA RAYA',
            'title' => 'A clearer view of the world around us.',
            'intro' => 'Dhurva Tech Angkasa Raya helps clients turn real-world environments into useful geospatial information. This page currently contains sample copy and can be updated with approved company information.',
            'image' => 'images/about/about-placeholder.svg',
            'mission_title' => 'Our Mission',
            'mission' => 'To provide reliable surveying and mapping information that supports safer planning, informed decisions, and better project outcomes.',
            'vision_title' => 'Our Vision',
            'vision' => 'To be a trusted technology partner for organizations that need a more accurate understanding of the physical world.',
            'values' => [
                ['title' => 'Accuracy', 'description' => 'We focus on dependable data and clear deliverables.'],
                ['title' => 'Professionalism', 'description' => 'We approach every project with care and accountability.'],
                ['title' => 'Innovation', 'description' => 'We use modern tools to make complex information easier to understand.'],
            ],
        ];
    }

    public function homeCallToAction(): array
    {
        return [
            'eyebrow' => 'HAVE A PROJECT IN MIND?',
            'title' => 'Let’s map out your next project.',
            'description' => 'Talk with our team about your surveying, mapping, or spatial-data requirements.',
        ];
    }
}
