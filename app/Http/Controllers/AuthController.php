<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function createUser(RegistrationRequest $request, AuthService $service): RedirectResponse
    {
        $service->createUser($request->createRegistrationNewUserDto());

        return redirect(route('home'));
    }

    public function login(LoginRequest $request, AuthService $service): View|RedirectResponse
    {
        $sessionId = Session::getId();

        if($service->login($request->getEmail(),$request->getPassword(), $sessionId)) {
            return redirect(route('home'));
        } else {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Неверное имя пользователя или пароль']);
        }
    }
}
