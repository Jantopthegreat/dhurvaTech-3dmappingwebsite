<?php

namespace App\Http\Controllers;

use App\Repositories\PageContentRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\DocumentationRepository;
use App\Repositories\MitraRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private PageContentRepository $pages,
        private ServiceRepository $services,
        private DocumentationRepository $documentation,
        private MitraRepository $mitra,
    ) {
    }

    public function index(): View
    {
        return view('pages.home', [
            'hero' => $this->pages->homeHero(),
            'services' => array_slice($this->services->all(), 0, 4),
            'serviceSlides' => $this->services->getHomepageSlides(),
            'documentation' => $this->documentation->homePreview(),
            'mitra' => $this->mitra->all(),
        ]);
    }
}
