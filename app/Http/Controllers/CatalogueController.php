<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogueRequest;
use App\Services\CategoryService;
use App\Services\ProductService;

class CatalogueController extends Controller
{
    public function index(ProductService $productService, CategoryService $categoryService, CatalogueRequest $request)
    {
        return view('catalogue')
            ->with('categories', $categoryService->getCategories())
            ->with('products', $productService->getProductsList($request->getCategory()));
    }
}
