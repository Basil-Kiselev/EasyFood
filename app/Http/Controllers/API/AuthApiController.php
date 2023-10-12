<?php

namespace App\Http\Controllers\API;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\DefaultResultResource;
use App\Services\AuthService;

class AuthApiController extends Controller
{
    public function register(RegistrationRequest $request, AuthService $service): DefaultResultResource
    {
        $result = $service->registerApi($request->createRegistrationNewUserDto());

        return new DefaultResultResource(
            !empty($result),
            $result ?? null,
        );
    }

    public function login(LoginRequest $request, AuthService $service): DefaultResultResource
    {
        $fingerprint = AuthHelper::fingerprint();
        $result = $service->loginApi($request->getEmail(), $request->getPassword(), $fingerprint);

        return new DefaultResultResource(
            !empty($result),
            $result ?? null,
        );
    }

    public function logout(): bool
    {
        return auth('sanctum')->user()->currentAccessToken()->delete();
    }
}
