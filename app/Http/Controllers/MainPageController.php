<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(CategoryService $categoryService, SettingService $settingService, ProductService $productService)
    {
        return view('home')
                ->with('categories', $categoryService->getCategories())
                ->with('phone', $settingService->getSettingByCode(Setting::CODE_PHONE))
                ->with('address', $settingService->getSettingByCode(Setting::CODE_ADDRESS))
                ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL))
                ->with('recCategories', $productService->getRecommendedProduct());
    }
}
