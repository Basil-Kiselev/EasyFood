<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();
        $view
            ->with('freeDelivery', $settingService->getSettingByCode(Setting::CODE_FREE_DELIVERY))
            ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL));
    }
}
