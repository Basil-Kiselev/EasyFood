<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Services\SearchProductService;

class SearchProductController extends Controller
{
    public function index(SearchProductRequest $request, SearchProductService $service)
    {
        return view('search')->with('foundProducts', $service->getData($request->getDataInput()));
    }
}
