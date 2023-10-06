<?php

namespace App\View\Composers;

use App\Helpers\AuthHelper;
use App\Models\Setting;
use App\Services\CartService;
use App\Services\SettingService;
use App\Services\UserFavoriteProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HeaderComposer
{
    public function compose(View $view): void
    {
        $settingService = new SettingService();
        $favoriteProductService = new UserFavoriteProductService();
        $cartService = new CartService();
        $cartInfo = Auth::check() ? $cartService->getUserCartHeaderInfo(Auth::id()) : $cartService->getSessionCartHeaderInfo(AuthHelper::fingerprint());
        $countFavoriteProduct = Auth::check() ? $favoriteProductService->getCountFavoriteProducts(Auth::id()) : null;

        $view
            ->with('freeDelivery', $settingService->getSettingByCode(Setting::CODE_FREE_DELIVERY))
            ->with('email', $settingService->getSettingByCode(Setting::CODE_EMAIL))
            ->with('countFavoriteProducts', $countFavoriteProduct)
            ->with('cartInfo', $cartInfo);
    }
}
