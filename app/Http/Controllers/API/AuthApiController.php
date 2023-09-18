<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;

class AuthApiController extends Controller
{
    public function registrationNewUser(RegistrationRequest $request, AuthService $service): bool|string
    {
        return $service->registrationUserApi($request->createRegistrationNewUserDto());
    }

    public function loginUser(LoginRequest $request, AuthService $service): bool|string
    {
        $fingerprint = AuthHelper::fingerprint();

        return $service->loginUserApi($request->getEmail(), $request->getPassword(), $fingerprint);
    }

    public function logoutUser(): bool
    {
        return auth('sanctum')->user()->currentAccessToken()->delete();
    }
}
