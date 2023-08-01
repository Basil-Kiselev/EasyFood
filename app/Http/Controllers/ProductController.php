<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductService $service, string $article): View
    {
        return view('product')
            ->with('productInfo', $service->getProduct($article))
            ->with('relatedProducts', $service->getRelatedProducts($article))
            ->with('breadcrumbsName', $service->getProduct($article)->getName());
    }
}
