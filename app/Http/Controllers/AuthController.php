<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function createUser(RegistrationRequest $request, AuthService $service): string
    {
        $newUser = $service->createUser(
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getPassword(),
        );

        return $newUser;
    }
}
