<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class MainPageController extends Controller
{
    public function index(ProductService $productService)
    {
        return view('home')->with('recCategories', $productService->getRecommendedProduct());
    }
}
