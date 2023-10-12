<?php

namespace App\Services;

use App\Events\UserLogin;
use App\Models\User;
use App\Services\DTO\RegistrationNewUserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public const AUTH_API_TRUE = true;

    public function register(RegistrationNewUserDTO $userData, string|null $fingerprint = null): bool
    {
        $newUser = User::query()->create([
            'name' => $userData->getName(),
            'phone' => $userData->getPhone(),
            'email' => $userData->getEmail(),
            'password' => Hash::make($userData->getPassword()),
        ]);

        Auth::login($newUser);
        $userId = Auth::id();
        event(new UserLogin($userId, $fingerprint));

        return true;
    }

    public function login(string $email, string $password, string|null $fingerprint = null): bool
    {
        $credential = [
          'email' => $email,
          'password' => $password,
        ];
        Auth::attempt($credential);

        if ($fingerprint != null && Auth::check()) {
            $userId = Auth::id();
            event(new UserLogin($userId, $fingerprint));
        }
        return Auth::check();
    }

    public function loginOrRegister(RegistrationNewUserDTO $userData, string|null $fingerprint = null, bool|null $api = null): string|bool
    {
        $email = $userData->getEmail();
        $user = User::query()->where('email', $email)->first();

        if ($api === true) {

            if (empty($user)) {
                return $this->registerApi($userData);
            } else {
                $password = $userData->getPassword();

                return $this->loginApi($email, $password, $fingerprint);
            }

        } elseif (empty($user)) {
            $this->register($userData, $fingerprint);

            return 'Вы зарегистрировались';
        } else {
            $password = $userData->getPassword();
            $this->login($email, $password, $fingerprint);

            return 'Вы уже были зарегистрированы';
        }
    }

    public function loginApi(string $email, string $password, string|null $fingerprint = null): bool|string
    {
        $credential = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credential)) {
            /** @var User $user */
            $user = User::query()->where('email', $email)->first();
            $apiToken = $user->createToken('api')->plainTextToken;

            if ($fingerprint != null && $apiToken != null) {
                $userId = $user->getId();
                event(new UserLogin($userId, $fingerprint));
            }

            return $apiToken;
        } else {

            return false;
        }
    }

    public function registerApi(RegistrationNewUserDTO $userData): bool|string
    {
        /** @var User $newUser */
        $newUser = User::query()->create([
            'name' => $userData->getName(),
            'phone' => $userData->getPhone(),
            'email' => $userData->getEmail(),
            'password' => Hash::make($userData->getPassword()),
        ]);

        return $newUser->createToken('api')->plainTextToken;
    }
}
