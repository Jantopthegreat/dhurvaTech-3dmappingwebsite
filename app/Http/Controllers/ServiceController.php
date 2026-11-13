<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use App\Repositories\ProductRepository;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __construct(private ServiceRepository $services, private ProductRepository $products)
    {
    }

public function index(): View
{
    return view('pages.services.index', [
        'services' => $this->services->all(),
        'serviceSlides' => $this->services->getServicePageSlides(),
        'catalogProducts' => array_slice($this->products->all(), 0, 6),
    ]);
}

    public function show(string $slug): View
    {
        $service = $this->services->findBySlug($slug);
        abort_if($service === null, 404);

        $relatedServices = array_values(array_filter(
            $this->services->all(),
            fn (array $item): bool => $item['slug'] !== $slug,
        ));

        return view('pages.services.show', [
            'service' => $service,
            'relatedServices' => array_slice($relatedServices, 0, 3),
        ]);
    }
}
