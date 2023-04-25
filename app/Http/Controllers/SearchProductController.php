<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchProductRequest;
use App\Models\Setting;
use App\Services\CategoryService;
use App\Services\SearchProductService;
use App\Services\SettingService;
use Illuminate\Database\Eloquent\Collection;

class SearchProductController extends Controller
{
    public function index(SearchProductRequest $request, SearchProductService $service, SettingService $settingService, CategoryService $categoryService)
    {
        return view('search')
            ->with('categories', $categoryService->getCategories())
            ->with('foundProducts', $service->getData($request->getDataInput()))
            ->with('phone', $settingService->getSettingByCode(Setting::CODE_PHONE))
            ->with('address', $settingService->getSettingByCode(Setting::CODE_ADDRESS))
            ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL));
    }
}
