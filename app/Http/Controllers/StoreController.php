<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function __construct(private ProductRepository $products)
    {
    }

    public function index(): View
    {
        return view('pages.store.index', [
            'products' => $this->products->all(),
        ]);
    }

    public function show(string $slug): View
    {
        $product = $this->products->findBySlug($slug);
        abort_if($product === null, 404);

        return view('pages.store.show', [
            'product' => $product,
        ]);
    }
}
