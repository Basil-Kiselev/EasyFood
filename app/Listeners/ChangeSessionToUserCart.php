<?php

namespace App\Listeners;

use App\Events\UserLogin;
use App\Services\CartService;

class ChangeSessionToUserCart
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        $userId = $event->getUserId();
        $sessionId = $event->getSessionId();

        if ($sessionId != null && $userId != null) {
            $service = new CartService();
            $service->changeSessionToUser($sessionId, $userId);
        }
    }
}
