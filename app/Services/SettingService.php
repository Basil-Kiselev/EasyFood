<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService
{
    public function getSettings(string $type = null): Collection
    {
        $query = Setting::query();

        if ($type) {
            $query = $query->where('type', $type);
        }

        return $query->get();
    }

    public function getSettingByCode(string $code): string|null
    {
        return Setting::query()->where('code', $code)->value('value');
    }
}
