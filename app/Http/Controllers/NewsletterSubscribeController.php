<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscribeRequest;
use App\Services\NewsletterSubscribeService;
use Illuminate\Http\JsonResponse;

class NewsletterSubscribeController extends Controller
{
    public function subscribeNewEmail(NewsletterSubscribeService $service, NewsletterSubscribeRequest $request): JsonResponse
    {
        $result = $service->subscribeNewEmail($request->getEmail());

        return new JsonResponse(['message' => $result]);
    }
}
