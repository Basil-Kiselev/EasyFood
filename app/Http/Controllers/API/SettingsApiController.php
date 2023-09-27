<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Http\Resources\SettingsCollection;
use App\Services\SettingService;

class SettingsApiController extends Controller
{
    public function getSettings(SettingService $service, SettingsRequest $request): SettingsCollection
    {
        $settingType = $request->getType();
        $settingCode = $request->getCodes();

        return new SettingsCollection($service->getSettingByParam($settingType, $settingCode));
    }
}
