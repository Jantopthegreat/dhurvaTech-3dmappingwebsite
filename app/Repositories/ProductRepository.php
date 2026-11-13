<?php

namespace App\Repositories;

/** Sample Store items. No cart or payment integration is implemented. */
class ProductRepository
{
    
public function all(): array
{
    return [
        [
            'slug' => 'mapping-drone',
            'name' => 'Mapping Drone',
            'category' => 'Drone Platform',
            'type' => 'rent',
            'description' => 'Sample product description for a drone used in surveying and mapping workflows.',
            'image' => 'images/products/product-drone-placeholder.svg',
            'availability' => 'Contact for availability',
            'price_label' => 'Hubungi Kami',
        ],
        [
            'slug' => 'gnss-receiver',
            'name' => 'GNSS Receiver',
            'category' => 'Survey Equipment',
            'type' => 'rent',
            'description' => 'Sample product description for a GNSS receiver used to support positioning tasks.',
            'image' => 'images/products/product-gnss-placeholder.svg',
            'availability' => 'Contact for availability',
            'price_label' => 'Hubungi Kami',
        ],
        [
            'slug' => 'lidar-sensor',
            'name' => 'LiDAR Sensor',
            'category' => 'Mapping Sensor',
            'type' => 'sale',
            'description' => 'Sample product description for a sensor designed for laser-based spatial data capture.',
            'image' => 'images/products/product-lidar-placeholder.svg',
            'availability' => 'Contact for availability',
            'price_label' => 'Hubungi Kami',
        ],
        [
            'slug' => 'survey-accessories',
            'name' => 'Survey Accessories',
            'category' => 'Accessories',
            'type' => 'sale',
            'description' => 'Sample product description for accessories used with surveying equipment.',
            'image' => 'images/products/product-accessories-placeholder.svg',
            'availability' => 'Contact for availability',
            'price_label' => 'Hubungi Kami',
        ],
    ];
}


    public function findBySlug(string $slug): ?array
    {
        foreach ($this->all() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }
}
