<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();
        $view
            ->with('phone', $settingService->getSettingByCode(Setting::CODE_PHONE))
            ->with('address', $settingService->getSettingByCode(Setting::CODE_ADDRESS))
            ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL));
    }
}