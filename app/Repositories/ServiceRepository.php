<?php

namespace App\Repositories;

use App\Models\Services;

/** Reads service content from the database for public pages. */
class ServiceRepository
{
    public function all(): array
    {
        $databaseServices = Services::query()->latest('id')->get()->map(static function (Services $service): array {
            return [
                'slug' => (string) $service->id,
                'title' => $service->judul,
                'short_description' => $service->sub_judul,
                'title_description' => $service->judul_deskripsi,
                'description' => $service->deskripsi,
                'title_point' => $service->judul_point,
                'point' => $service->point,
                'image' => $service->image
                    ? (str_starts_with($service->image, 'services/') ? asset('storage/' . $service->image) : asset($service->image))
                    : asset('images/services/service-placeholder.svg'),
                'highlights' => $service->content,
            ];
        })->all();

        if ($databaseServices !== []) {
            return $databaseServices;
        }

        return [];
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
    public function getHomepageSlides(): array
    {
        return array_slice($this->slidesFromDatabase(), 0, 5);
    }

    public function getServicePageSlides(): array
    {
        return $this->slidesFromDatabase();
    }

    private function slidesFromDatabase(): array
    {
        return array_map(
            static fn (array $service): array => [
                'slug' => $service['slug'],
                'title' => mb_strtoupper($service['title']),
                'image' => $service['image'],
                'alt' => $service['title'] . ' service',
            ],
            $this->all(),
        );
    }
}
