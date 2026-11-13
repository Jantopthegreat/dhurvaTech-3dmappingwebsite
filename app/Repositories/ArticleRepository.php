<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function all(): array
    {
        return Article::query()
            ->latest('published_at')
            ->get()
            ->map(fn (Article $article): array => $article->toArray())
            ->all();
    }

    public function findBySlug(string $slug): ?array
    {
        $article = Article::query()->where('slug', $slug)->first();

        return $article?->toArray();
    }
}
