<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService
{
    public function getSettingByCode(string $code): string|null
    {
        return Setting::query()->where('code', $code)->value('value');
    }

    public function getSettingByParam(?string $settingType = null, ?array $settingCode = null ): Collection|array
    {
        $result = [];
        $query = Setting::query();

        if (!empty($settingType)) {
            $result = $query->where('type', $settingType);
        }

        if (!empty($settingCode)) {
            $result = $query->whereIn('code', $settingCode);
        }

        return $result->get();
    }
}

