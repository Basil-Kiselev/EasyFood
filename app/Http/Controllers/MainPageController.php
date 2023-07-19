<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function index(ProductService $productService): View
    {
        return view('home')->with('recCategories', $productService->getRecommendedProduct());
    }
}
