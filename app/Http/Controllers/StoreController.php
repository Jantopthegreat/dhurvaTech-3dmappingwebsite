<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function __construct(private ProductRepository $products)
    {
    }

    public function index(Request $request): View
    {
        $allProducts = collect($this->products->all());

        // Search filter
        $search = trim($request->query('q', ''));

        if ($search !== '') {
            $allProducts = $allProducts->filter(function ($product) use ($search) {
                $searchable = implode(' ', [
                    $product['name'],
                    $product['category'],
                    $product['description'],
                ]);

                return Str::contains(
                    Str::lower($searchable),
                    Str::lower($search)
                );
            });
        }

        // Category filter
        $category = $request->query('category');

        if ($category) {
            $allProducts = $allProducts->where('category', $category);
        }

        // Separate rental and sale products
        $rentItems = $allProducts
            ->where('type', 'rent')
            ->values();

        $saleItems = $allProducts
            ->where('type', 'sale')
            ->values();

        // Independent pagination
        $rentProducts = $this->paginateProducts(
            $rentItems,
            8,
            'rent_page',
            $request
        );

        $saleProducts = $this->paginateProducts(
            $saleItems,
            8,
            'sale_page',
            $request
        );

        // Available category options
        $categories = collect($this->products->all())
            ->pluck('category')
            ->unique()
            ->sort()
            ->values();

        return view('pages.store.index', [
            'rentProducts' => $rentProducts,
            'saleProducts' => $saleProducts,
            'categories' => $categories,
        ]);
    }

    private function paginateProducts(
        Collection $items,
        int $perPage,
        string $pageName,
        Request $request
    ): LengthAwarePaginator {
        $currentPage = LengthAwarePaginator::resolveCurrentPage($pageName);

        $query = $request->query();

        // Exclude this paginator's own page parameter.
        unset($query[$pageName]);

        return new LengthAwarePaginator(
            $items->forPage($currentPage, $perPage)->values(),
            $items->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $query,
                'pageName' => $pageName,
            ]
        );
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
