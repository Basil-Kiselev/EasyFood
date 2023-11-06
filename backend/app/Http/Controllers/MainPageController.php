<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\ProductService;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function index(ProductService $productService, BlogService $blogService): View
    {
        return view('home')
            ->with('recCategories', $productService->getRecommendedProduct())
            ->with('articles', $blogService->prepareArticlesDTO($blogService->getRandomArticles()));
    }
}
