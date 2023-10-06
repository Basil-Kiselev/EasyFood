<?php

namespace App\Services;

use App\Models\NewsletterSubscriber;
use Carbon\Carbon;

class SubscribeService
{
    public function subscribeNewEmail(string $email): bool
    {
        $timeCreate = Carbon::now();
        $subscriberData = [
            'email' => $email,
            'created_at' => $timeCreate,
        ];

        $currentEmail = NewsletterSubscriber::query()->where('email', $email)->exists();

        if (!empty($currentEmail)) {
            NewsletterSubscriber::query()->create($subscriberData);
        }

        return true;
    }
}
