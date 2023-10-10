<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;

class AuthApiController extends Controller
{
    public function register(RegistrationRequest $request, AuthService $service): bool|string
    {
        return $service->registerApi($request->createRegistrationNewUserDto());
    }

    public function login(LoginRequest $request, AuthService $service): bool|string
    {
        $fingerprint = AuthHelper::fingerprint();

        return $service->loginApi($request->getEmail(), $request->getPassword(), $fingerprint);
    }

    public function logout(): bool
    {
        return auth('sanctum')->user()->currentAccessToken()->delete();
    }
}
