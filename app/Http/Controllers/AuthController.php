<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function createUser(RegistrationRequest $request, AuthService $service): string
    {
        $service->createUser($request->createRegistrationNewUserDto());

        return redirect(route('home'));
    }

    public function login(LoginRequest $request, AuthService $service)
    {
        if($service->login($request->getEmail(),$request->getPassword())) {
            return redirect(route('home'));
        } else {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Неверное имя пользователя или пароль']);
        }
    }
}
