<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\PageContentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private PageContentRepository $pages,
        private ServiceRepository $services,
        private ProjectRepository $projects,
        private ArticleRepository $articles,
    ) {
    }

    public function index(): View
    {
        return view('pages.home', [
            'hero' => $this->pages->homeHero(),
            'aboutPreview' => $this->pages->homeAboutPreview(),
            'services' => array_slice($this->services->all(), 0, 4),
            'projects' => $this->projects->all(),
            'articles' => array_slice($this->articles->all(), 0, 3),
            'cta' => $this->pages->homeCallToAction(),
        ]);
    }
}
