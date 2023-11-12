<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Http\Resources\SettingsResource;
use App\Services\SettingService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SettingsApiController extends Controller
{
    public function getSettings(SettingService $service, SettingsRequest $request): AnonymousResourceCollection
    {
        return SettingsResource::collection($service->getSettingsByCodes($request->getCodes()));
    }
}
