<?php

namespace App\Services;

use App\Models\Setting;
use App\Services\DTO\SettingDTO;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function getSettingsByCodes(array $settingCodes): array
    {
        $settings = Cache::tags(Setting::CACHE_SETTINGS_TAG)->many($settingCodes);
        $settingsByCodesDto = [];

        foreach ($settings as $settingCode => $settingValue) {

            if ($settingValue === null) {
                $settingValue = Setting::query()->where('code', $settingCode)->value('value');
                Cache::tags(Setting::CACHE_SETTINGS_TAG)->put($settingCode, $settingValue);
            }

            $settingsByCodesDto[] = new SettingDTO($settingCode, $settingValue);
        }

        return $settingsByCodesDto;
    }
}

