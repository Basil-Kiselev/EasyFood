<?php

namespace App\Http\Controllers\API;

use App\Events\UserLogin;
use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\AuthService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderApiController extends Controller
{
    public function createOrder(OrderRequest $request, OrderService $orderService, AuthService $authService): JsonResponse
    {
        $fingerprint = AuthHelper::fingerprint();

        if (($request->isCreateAcc())) {
            $authService->loginOrRegister($request->composeNewUserDTO(), AuthService::AUTH_API_TRUE);
            event(new UserLogin(auth('sanctum')->id(), AuthHelper::fingerprint()));
        }

        $userId = auth('sanctum')->id();
        $orderDTO = $request->composeOrderDTO();
        $orderId = $orderService->createOrder($orderDTO, $fingerprint, $userId);

        return response()->json(['order_id' => $orderId]);
    }
}
