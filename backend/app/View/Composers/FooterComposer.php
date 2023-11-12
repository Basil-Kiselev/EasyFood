<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\DTO\SettingDTO;
use App\Services\SettingService;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();

        /** @var SettingDTO[] $settingsDto */
        $settingsDto = $settingService->getSettingsByCodes([
            Setting::CODE_PHONE,
            Setting::CODE_ADDRESS,
            Setting::CODE_EMAIL
        ]);

        $settingsCollectionDto = collect($settingsDto);

        $settings = $settingsCollectionDto->mapWithKeys(function (SettingDTO $settingDto) {
            return [$settingDto->getCode() => $settingDto->getValue()];
        });

        $view
            ->with('phone', $settings['phone'] ?? null)
            ->with('address', $settings['address'] ?? null)
            ->with('email', $settings['email'] ?? null);
    }
}
