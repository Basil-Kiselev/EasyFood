<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\SettingService;
use App\Services\UserFavoriteProductService;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();
        $favoriteProductService = new UserFavoriteProductService();
        $view
            ->with('freeDelivery', $settingService->getSettingByCode(Setting::CODE_FREE_DELIVERY))
            ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL))
            ->with('countFavoriteProducts', $favoriteProductService->getCountFavoriteProducts());
    }
}
