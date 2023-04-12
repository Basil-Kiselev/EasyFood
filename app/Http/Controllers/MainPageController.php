<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(CategoryService $categoryService)
    {
        return view('home')->with('categories', $categoryService->getCategories());
    }
}
