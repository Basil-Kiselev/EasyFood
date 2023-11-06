<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Services\ProductService;
use Illuminate\View\View;

class SearchProductController extends Controller
{
    public function index(SearchProductRequest $request, ProductService $service): View
    {
        return view('search')->with('foundProducts', $service->searchProducts($request->getDataInput()));
    }
}
