<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackMessageRequest;
use App\Http\Requests\SubscribeRequest;
use App\Services\ContactsService;
use App\Services\SubscribeService;
use Illuminate\Http\JsonResponse;

class ContactsApiController extends Controller
{
    public function subscribeNewEmail(SubscribeService $service, SubscribeRequest $request): JsonResponse
    {
        $result = $service->subscribeNewEmail($request->getEmail());

        return new JsonResponse(['message' => $result]);
    }

    public function sendFeedbackMessage(ContactsService $service, FeedbackMessageRequest $request): JsonResponse
    {
        $name = $request->getName();
        $email = $request->getEmail();
        $text = $request->getText();
        $result = $service->createMessage($name, $email, $text);

        return new JsonResponse(['message' => $result]);
    }
}
