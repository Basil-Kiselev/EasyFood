<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterForCatalogueRequest;
use App\Services\CategoryService;
use App\Services\DTO\FilterForCatalogueDTO;
use App\Services\ProductService;
use Illuminate\View\View;

class CatalogueController extends Controller
{
    public function index(ProductService $productService, CategoryService $categoryService, FilterForCatalogueRequest $request): View
    {
        $filterForCatalogueDTO = new FilterForCatalogueDTO(
            $request->getCategory(),
            $request->getPriceMin(),
            $request->getPriceMax(),
            $request->getIsVegan(),
        );

        return view('catalogue')
            ->with('categories', $categoryService->getCategories())
            ->with('products', $productService->getProductsList($filterForCatalogueDTO)->withQueryString())
            ->with('breadcrumbsName', $categoryService->getCategoryName($request->getCategory()));
    }
}
