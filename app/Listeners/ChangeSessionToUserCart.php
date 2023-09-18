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
        $fingerprint = $event->getFingerprint();

        if ($fingerprint != null && $userId != null) {
            $service = new CartService();
            $service->changeSessionToUser($fingerprint, $userId);
        }
    }
}
