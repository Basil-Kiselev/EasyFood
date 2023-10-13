<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request, AuthService $service): RedirectResponse
    {
        $fingerprint = Session::get('fingerprint');
        $service->register($request->createRegistrationNewUserDto(), $fingerprint);

        return redirect(route('home'));
    }

    public function login(LoginRequest $request, AuthService $service): View|RedirectResponse
    {
        $fingerprint = Session::get('fingerprint');

        if($service->login($request->getEmail(),$request->getPassword(), $fingerprint)) {
            return redirect(route('home'));
        } else {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Неверное имя пользователя или пароль']);
        }
    }

    public function logout(): RedirectResponse
    {
        Session::remove('user_id');
        Auth::logout();

        return redirect('/');
    }
}
