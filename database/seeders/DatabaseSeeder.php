<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@dhurvatech.test'],
            [
                'name' => 'Admin Dhurva Tech',
                'password' => 'password',
                'is_admin' => true,
            ],
        );

        // foreach ([
        //     ['understanding-drone-mapping', 'Understanding Drone Mapping for Modern Projects', 'Drone Survey', '2026-10-01', '5 min read', 'A practical introduction to how aerial data can support site documentation and planning.', 'images/blog/article-drone-placeholder.svg'],
        //     ['what-is-lidar', 'What Is LiDAR and When Is It Useful?', 'LiDAR', '2026-09-18', '4 min read', 'Learn the basics of laser-based measurement and 3D point-cloud data.', 'images/blog/article-lidar-placeholder.svg'],
        //     ['getting-started-with-bathymetry', 'Getting Started with Bathymetric Surveying', 'Bathymetry', '2026-09-05', '6 min read', 'Explore how underwater depth information is collected and represented.', 'images/blog/article-bathymetry-placeholder.svg'],
        //     ['why-3d-models-matter', 'Why 3D Models Matter for Project Communication', '3D Model', '2026-08-22', '3 min read', 'How spatial context can help teams explain existing conditions and design ideas.', 'images/blog/article-3d-model-placeholder.svg'],
        // ] as [$slug, $title, $category, $publishedAt, $readTime, $excerpt, $image]) {
        //     Article::updateOrCreate(['slug' => $slug], [
        //         'title' => $title,
        //         'category' => $category,
        //         'published_at' => $publishedAt,
        //         'read_time' => $readTime,
        //         'excerpt' => $excerpt,
        //         'image' => $image,
        //         'content' => [$excerpt, 'This article is sample content. Replace it with reviewed editorial copy before the website goes live.'],
        //     ]);
        // }
    }
}
