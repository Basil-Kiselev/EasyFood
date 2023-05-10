<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogueRequest;
use App\Services\CategoryService;
use App\Services\Dto\CatalogueDto;
use App\Services\ProductService;

class CatalogueController extends Controller
{
    public function index(ProductService $productService, CategoryService $categoryService, CatalogueRequest $request)
    {
        $catalogueDto = new CatalogueDto(
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
