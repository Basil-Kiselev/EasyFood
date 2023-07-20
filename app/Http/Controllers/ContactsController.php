<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackMessageRequest;
use App\Services\ContactsService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function index(ContactsService $service): View
    {
        return view('contact')->with('contactsData', $service->getContactsData());
    }

    public function createMessage(ContactsService $service, FeedbackMessageRequest $request): JsonResponse
    {
        $name = $request->getName();
        $email = $request->getEmail();
        $text = $request->getText();

        $service->createMessage($name, $email, $text);

        return new JsonResponse(['message' => 'Спасибо за обратную связь']);
    }
}
