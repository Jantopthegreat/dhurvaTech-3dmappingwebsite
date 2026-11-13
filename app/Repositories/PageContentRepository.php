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
            'eyebrow' => 'Cakrawala Geosurvey',
            'title' => 'Cakrawala Geosurvey',
            'subtitle' => 'Cakrawala Geosurvey.',
            'description' => 'Solusi Presisi untuk Survei dan Pemetaan Anda Hadir sejak tahun 2020, PT Cakrawala Pilar Nusantara (Cakrawala Geosurvey) adalah mitra tepercaya yang siap membantu Anda dengan layanan konsultan survei, pengukuran, dan pemetaan yang akurat.',
            'image' => 'images/hero/herolandscape.png',
            'feature' => [
                'image' => 'images/hero/hero-feature-placeholder.svg',
                'title' => 'Accurate Data for Every Project',
                'description' => 'Modern mapping solutions to support analysis, planning, and better decision-making.',
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
