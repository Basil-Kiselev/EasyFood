<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Services\SubscribeService;
use Illuminate\Http\JsonResponse;

class SubscribeApiController extends Controller
{
    public function subscribeNewEmail(SubscribeService $service, SubscribeRequest $request): JsonResponse
    {
        $result = $service->subscribeNewEmail($request->getEmail());

        return new JsonResponse(['message' => $result]);
    }
}
