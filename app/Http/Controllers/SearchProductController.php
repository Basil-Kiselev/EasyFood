<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Services\ProductService;

class SearchProductController extends Controller
{
    public function index(SearchProductRequest $request, ProductService $service)
    {
        return view('search')->with('foundProducts', $service->searchProducts($request->getDataInput()));
    }
}
