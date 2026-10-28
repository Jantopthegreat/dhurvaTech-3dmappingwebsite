<?php

namespace App\Repositories;

/** Sample blog content; descriptions and dates are placeholders, not published articles. */
class ArticleRepository
{
    public function all(): array
    {
        return [
            [
                'slug' => 'understanding-drone-mapping',
                'title' => 'Understanding Drone Mapping for Modern Projects',
                'category' => 'Drone Survey',
                'published_at' => '2026-10-01',
                'read_time' => '5 min read',
                'excerpt' => 'A practical introduction to how aerial data can support site documentation and planning.',
                'image' => 'images/blog/article-drone-placeholder.svg',
                'content' => [
                    'Drone mapping can help teams observe a site from above and produce structured spatial information for planning and documentation.',
                    'The appropriate sensors, flight plan, ground control, and processing method depend on project requirements and site conditions.',
                    'This article is sample content. Replace it with reviewed editorial copy before the website goes live.',
                ],
            ],
            [
                'slug' => 'what-is-lidar',
                'title' => 'What Is LiDAR and When Is It Useful?',
                'category' => 'LiDAR',
                'published_at' => '2026-09-18',
                'read_time' => '4 min read',
                'excerpt' => 'Learn the basics of laser-based measurement and 3D point-cloud data.',
                'image' => 'images/blog/article-lidar-placeholder.svg',
                'content' => [
                    'LiDAR measures distances using laser pulses and can produce dense point clouds representing surfaces and objects.',
                    'Different platforms and sensors suit different tasks, so accuracy requirements, environment, and deliverable format should be discussed before data acquisition.',
                    'This article is sample content. Replace it with reviewed editorial copy before the website goes live.',
                ],
            ],
            [
                'slug' => 'getting-started-with-bathymetry',
                'title' => 'Getting Started with Bathymetric Surveying',
                'category' => 'Bathymetry',
                'published_at' => '2026-09-05',
                'read_time' => '6 min read',
                'excerpt' => 'Explore how underwater depth information is collected and represented.',
                'image' => 'images/blog/article-bathymetry-placeholder.svg',
                'content' => [
                    'Bathymetric surveys map underwater depth and terrain in water bodies such as rivers, reservoirs, lakes, and coastal zones.',
                    'Survey planning should account for water conditions, required coverage, reference systems, and the accuracy of the final data.',
                    'This article is sample content. Replace it with reviewed editorial copy before the website goes live.',
                ],
            ],
            [
                'slug' => 'why-3d-models-matter',
                'title' => 'Why 3D Models Matter for Project Communication',
                'category' => '3D Model',
                'published_at' => '2026-08-22',
                'read_time' => '3 min read',
                'excerpt' => 'How spatial context can help teams explain existing conditions and design ideas.',
                'image' => 'images/blog/article-3d-model-placeholder.svg',
                'content' => [
                    'Three-dimensional models can make complex site information more accessible to technical and non-technical audiences.',
                    'A useful model starts with clear requirements: intended users, level of detail, coordinate reference, file format, and update process.',
                    'This article is sample content. Replace it with reviewed editorial copy before the website goes live.',
                ],
            ],
        ];
    }

    public function findBySlug(string $slug): ?array
    {
        foreach ($this->all() as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }

        return null;
    }
}
