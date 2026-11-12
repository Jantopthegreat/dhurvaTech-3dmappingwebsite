<?php

namespace App\Repositories;


class DocumentationRepository
{
    /**
     * Homepage documentation section data.
     */
    public function homePreview(): array
    {
        return [
            // Section background image
            'background_image' => 'images/documentation/background/documentation-bg.jpg',

            // Bottom section description
            'description' => 'Jelajahi rekam jejak kami melalui galeri dokumentasi kegiatan di lapangan. Mulai dari kegiatan scanning hingga survei batimetri, ini adalah bukti nyata komitmen kami dalam menghadirkan hasil pengukuran yang presisi, andal, dan terpercaya untuk setiap proyek Anda.',

            // Video documentation
            'videos' => [
                [
                    'id' => 'survey-video',
                    'title' => 'Dokumentasi Kegiatan Survey',
                    'description' => 'Dokumentasi kegiatan survei dan pengukuran lapangan yang dilakukan oleh tim profesional kami.',
                    'video_path' => null,
                    'embed_url' => null,
                ],
                [
                    'id' => 'mapping-video',
                    'title' => 'Dokumentasi Kegiatan Mapping',
                    'description' => 'Dokumentasi proses pemetaan menggunakan teknologi dan peralatan survei modern.',
                    'video_path' => null,
                    'embed_url' => null,
                ],
            ],

            // Photo documentation galleries
            'galleries' => [
                'survey' => [
                    'title' => 'Kegiatan Survey',

                    'photos' => [
                        [
                            'image' => 'images/documentation/survey/survey-01.jpg',
                            'alt' => 'Kegiatan pengukuran survei lapangan',
                        ],
                        [
                            'image' => 'images/documentation/survey/survey-02.jpg',
                            'alt' => 'Dokumentasi kegiatan survei proyek',
                        ],
                        [
                            'image' => 'images/documentation/survey/survey-03.jpg',
                            'alt' => 'Tim melakukan kegiatan survei',
                        ],
                    ],
                ],

                'drone' => [
                    'title' => 'Kegiatan Drone',

                    'photos' => [
                        [
                            'image' => 'images/documentation/drone/drone-01.jpg',
                            'alt' => 'Dokumentasi kegiatan drone',
                        ],
                        [
                            'image' => 'images/documentation/drone/drone-02.jpg',
                            'alt' => 'Persiapan drone untuk pemetaan',
                        ],
                        [
                            'image' => 'images/documentation/drone/drone-03.jpg',
                            'alt' => 'Kegiatan pengambilan data menggunakan drone',
                        ],
                        [
                            'image' => 'images/documentation/drone/drone-04.jpg',
                            'alt' => 'Dokumentasi hasil kegiatan drone',
                        ],
                    ],
                ],
            ],
        ];
    }
}
