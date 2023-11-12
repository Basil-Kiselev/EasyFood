<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\CategoryService;
use App\Services\DTO\SettingDTO;
use App\Services\SettingService;
use Illuminate\View\View;

class HeroComposer
{
    public function compose(View $view): void
    {
        $categoryService = new CategoryService();
        $settingService = new SettingService();

        /** @var SettingDTO[] $settingsDto */
        $settingsDto = $settingService->getSettingsByCodes([
            Setting::CODE_PHONE,
        ]);

        $settingsCollectionDto = collect($settingsDto);

        $settings = $settingsCollectionDto->mapWithKeys(function (SettingDTO $settingDto) {
            return [$settingDto->getCode() => $settingDto->getValue()];
        });

        $view
            ->with('phone', $settings['phone'] ?? null)
            ->with('categories', $categoryService->getCategories());
    }
}
