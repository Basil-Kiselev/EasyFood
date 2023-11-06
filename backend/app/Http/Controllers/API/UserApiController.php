<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\UserFavoriteProductService;
use Illuminate\Http\JsonResponse;

class UserApiController extends Controller
{
    public function getUserInfo(UserFavoriteProductService $service): JsonResponse
    {
        $userId = auth('sanctum')->id();
        $countUserFavoriteProducts = $service->getCountFavoriteProducts($userId);
        $userEmail = auth('sanctum')->user()->email;

        return new JsonResponse([
            'email' => $userEmail,
            'favoriteProductsCount' => $countUserFavoriteProducts,
            ]);
    }
}
