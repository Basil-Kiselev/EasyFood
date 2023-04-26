<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\CategoryService;
use App\Services\SettingService;
use Illuminate\View\View;

class HeroComposer
{
    public function compose(View $view): void
    {
        $categoryService = new CategoryService();
        $settingService = new SettingService();
        $view
            ->with('phone', $settingService->getSettingByCode(Setting::CODE_PHONE))
            ->with('categories', $categoryService->getCategories());
    }
}
