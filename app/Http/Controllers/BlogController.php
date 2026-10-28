<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(private ArticleRepository $articles)
    {
    }

    public function index(): View
    {
        return view('pages.blog.index', [
            'articles' => $this->articles->all(),
        ]);
    }

    public function show(string $slug): View
    {
        $article = $this->articles->findBySlug($slug);
        abort_if($article === null, 404);

        return view('pages.blog.show', [
            'article' => $article,
            'relatedArticles' => array_slice(array_values(array_filter(
                $this->articles->all(),
                fn (array $item): bool => $item['slug'] !== $slug,
            )), 0, 3),
        ]);
    }
}
