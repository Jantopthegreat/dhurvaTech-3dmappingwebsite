<?php

namespace App\Http\Controllers;

use App\Repositories\PageContentRepository;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __construct(private PageContentRepository $pages)
    {
    }

    public function index(): View
    {
        return view('pages.about', [
            'about' => $this->pages->aboutPage(),
        ]);
    }
}
