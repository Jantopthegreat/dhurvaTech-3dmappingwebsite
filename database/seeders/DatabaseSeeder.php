<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Product;
use App\Models\Mitra;
use App\Models\Services;
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

        foreach ([
            ['nama' => 'Mitra Survei Nusantara', 'image' => null],
            ['nama' => 'Geo Infrastruktur Indonesia', 'image' => null],
            ['nama' => 'Teknologi Pemetaan Mandiri', 'image' => null],
        ] as $partner) {
            Mitra::updateOrCreate(
                ['nama' => $partner['nama']],
                $partner,
            );
        }

        foreach ([
            ['mapping-drone', 'Mapping Drone', 'Drone Platform', 'rent', 'Drone pemetaan untuk akuisisi data udara dan dokumentasi area proyek.', 'images/products/product-drone-placeholder.svg'],
            ['gnss-receiver', 'GNSS Receiver', 'Survey Equipment', 'rent', 'Perangkat GNSS untuk kebutuhan pengukuran dan positioning lapangan.', 'images/products/product-gnss-placeholder.svg'],
            ['lidar-sensor', 'LiDAR Sensor', 'Mapping Sensor', 'sale', 'Sensor LiDAR untuk pengambilan data spasial dan pemodelan 3D.', 'images/products/product-lidar-placeholder.svg'],
            ['survey-accessories', 'Survey Accessories', 'Accessories', 'sale', 'Perlengkapan pendukung untuk kegiatan survei dan pemetaan.', 'images/products/product-accessories-placeholder.svg'],
        ] as [$slug, $name, $category, $type, $description, $image]) {
            Product::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'category' => $category,
                'type' => $type,
                'description' => $description,
                'image' => $image,
                'availability' => 'Hubungi Kami',
                'price_label' => 'Hubungi Kami',
            ]);
        }

        foreach ([
            [
                'judul' => 'Drone Survey',
                'sub_judul' => 'Efficient aerial data capture for large or difficult-to-access areas.',
                'judul_deskripsi' => 'Aerial data acquisition for project planning.',
                'deskripsi' => 'Drone surveying uses aerial platforms and specialized sensors to capture current, high-resolution information about a site. Final deliverables depend on the approved scope and required accuracy.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Orthomosaic, elevation models, and aerial documentation.',
                'image' => 'images/services/survey-drone-placeholder.svg',
                'content' => ['Aerial data acquisition', 'Orthomosaic and elevation products', 'Support for site planning'],
            ],
            [
                'judul' => 'Bathymetry',
                'sub_judul' => 'Understand underwater terrain, depths, and submerged features.',
                'judul_deskripsi' => 'Underwater terrain mapping for informed decisions.',
                'deskripsi' => 'Bathymetric surveying helps map the underwater surface of rivers, lakes, reservoirs, and coastal environments. The resulting data supports analysis, planning, and monitoring of submerged areas.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Water-depth data, underwater terrain models, and survey maps.',
                'image' => 'images/services/bathymetry-placeholder.svg',
                'content' => ['Water-depth data capture', 'Underwater terrain representation', 'Planning and monitoring support'],
            ],
            [
                'judul' => 'Construction',
                'sub_judul' => 'Visual site data for planning, progress checks, and documentation.',
                'judul_deskripsi' => 'Spatial documentation throughout the construction process.',
                'deskripsi' => 'Surveying and mapping can help construction teams compare site conditions, communicate progress, and maintain a current spatial record throughout a project.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Site documentation, progress monitoring, and as-built information.',
                'image' => 'images/services/construction-placeholder.svg',
                'content' => ['Site documentation', 'Progress monitoring', 'As-built information support'],
            ],
            [
                'judul' => 'LiDAR',
                'sub_judul' => 'Capture dense 3D point-cloud data for detailed spatial analysis.',
                'judul_deskripsi' => 'High-density spatial data for detailed analysis.',
                'deskripsi' => 'LiDAR uses laser measurements to capture the shape of surfaces and objects. The resulting point cloud can support terrain modelling, asset mapping, and engineering workflows.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Point clouds, terrain models, and extracted spatial features.',
                'image' => 'images/services/lidar-placeholder.svg',
                'content' => ['3D point-cloud capture', 'Terrain and feature extraction', 'Detailed spatial analysis'],
            ],
            [
                'judul' => 'Topography',
                'sub_judul' => 'Map terrain, contours, and ground features for project planning.',
                'judul_deskripsi' => 'Accurate terrain information for planning and design.',
                'deskripsi' => 'Topographic surveys describe the position and elevation of ground features. The information can be used as a reference for planning, design, infrastructure, and land-development activities.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Contour maps, elevation data, and planning-ready survey outputs.',
                'image' => 'images/services/topography-placeholder.svg',
                'content' => ['Contour and elevation mapping', 'Ground-feature documentation', 'Planning-ready map outputs'],
            ],
            [
                'judul' => '3D Scanning',
                'sub_judul' => 'Create detailed digital representations of physical spaces and objects.',
                'judul_deskripsi' => 'Existing-condition capture for documentation and inspection.',
                'deskripsi' => '3D scanning captures the geometry of existing spaces, structures, or objects and translates it into digital spatial data for documentation, inspection, and design workflows.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Point clouds, spatial records, and detailed existing-condition data.',
                'image' => 'images/services/3d-scanning-placeholder.svg',
                'content' => ['Existing-condition capture', 'Point clouds and spatial records', 'Support for design and inspection'],
            ],
            [
                'judul' => '3D Model',
                'sub_judul' => 'Turn spatial data into clear and useful three-dimensional models.',
                'judul_deskripsi' => 'Three-dimensional visualization from spatial data.',
                'deskripsi' => '3D modelling transforms captured or supplied data into digital representations that are easier to inspect, communicate, and use in planning and presentation workflows.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Three-dimensional models for visualization, communication, and analysis.',
                'image' => 'images/services/3d-model-placeholder.svg',
                'content' => ['Three-dimensional visualization', 'Digital site representation', 'Support for presentations and analysis'],
            ],
            [
                'judul' => 'Design Architecture',
                'sub_judul' => 'Connect site information with architectural and spatial design.',
                'judul_deskripsi' => 'Site context for coordinated architectural design.',
                'deskripsi' => 'Architecture and design workflows benefit from an accurate understanding of site conditions. Spatial data can support coordination, visualization, and project communication.',
                'judul_point' => 'Potential deliverables',
                'point' => 'Site-context visualization and presentation-ready design material.',
                'image' => 'images/services/design-architecture-placeholder.svg',
                'content' => ['Site-context visualization', 'Design coordination support', 'Presentation-ready material'],
            ],
        ] as $service) {
            Services::updateOrCreate(
                ['judul' => $service['judul']],
                $service,
            );
        }

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
