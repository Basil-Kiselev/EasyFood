<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterForCatalogueRequest;
use App\Services\CategoryService;
use App\Services\Dto\FilterForCatalogueDto;
use App\Services\ProductService;

class CatalogueController extends Controller
{
    public function index(ProductService $productService, CategoryService $categoryService, FilterForCatalogueRequest $request)
    {
        $catalogueDto = new FilterForCatalogueDto(
            $request->getCategory(),
            $request->getPriceMin(),
            $request->getPriceMax(),
            $request->getIsVegan(),
        );

        return view('catalogue')
            ->with('categories', $categoryService->getCategories())
            ->with('products', $productService->getProductsList($catalogueDto));
    }
}
