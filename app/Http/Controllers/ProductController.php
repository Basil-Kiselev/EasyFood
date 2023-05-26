<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    public function index(ProductService $service, string $article)
    {
        return view('product')
            ->with('productInfo', $service->getProduct($article))
            ->with('relatedProducts', $service->getRelatedProducts($article));
    }
}
