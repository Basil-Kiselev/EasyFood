<?php

namespace App\Services;

use App\Models\NewsletterSubscriber;
use Carbon\Carbon;

class NewsletterSubscribeService
{
    public function subscribeNewEmail(string $email)
    {
        $timeCreate = Carbon::now();
        $subscriberData = [
            'email' => $email,
            'created_at' => $timeCreate,
        ];

        $currentEmail = NewsletterSubscriber::query()->where('email', $email)->exists();

        if ($currentEmail) {
            return 'Вы уже подписаны';
        } else {
            NewsletterSubscriber::query()->create($subscriberData);
            return 'Вы успешно подписались';
        }
    }
}
