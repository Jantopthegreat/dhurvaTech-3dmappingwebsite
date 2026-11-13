<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all(): array
    {
        return Product::query()->latest('id')->get()->map(
            static fn (Product $product): array => [
                'slug' => $product->slug,
                'name' => $product->name,
                'category' => $product->category,
                'type' => $product->type,
                'description' => $product->description,
                'image' => $product->image
                    ? (str_starts_with($product->image, 'products/')
                        ? asset('storage/' . $product->image)
                        : asset($product->image))
                    : asset('images/products/product-placeholder.svg'),
                'availability' => $product->availability,
                'price_label' => $product->price_label,
            ],
        )->all();
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
