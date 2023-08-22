<?php

namespace App\Services;

use App\Events\UserLogin;
use App\Models\User;
use App\Services\DTO\RegistrationNewUserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(RegistrationNewUserDTO $DTO): bool
    {
        $newUser = User::query()->create([
            'name' => $DTO->getName(),
            'phone' => $DTO->getPhone(),
            'email' => $DTO->getEmail(),
            'password' => Hash::make($DTO->getPassword()),
        ]);

        Auth::login($newUser);

        return true;
    }

    public function login(string $email, string $password, string|null $sessionId = null): bool
    {
        $credential = [
          'email' => $email,
          'password' => $password,
        ];
        Auth::attempt($credential);

        if ($sessionId != null && Auth::check()) {
            $userId = Auth::id();
            event(new UserLogin($userId, $sessionId));
        }

        return Auth::check();
    }

    public function loginOrRegister(RegistrationNewUserDTO $DTO): string
    {
        $email = $DTO->getEmail();
        $user = User::query()->where('email', $email)->first();

        if (empty($user)) {
            $this->createUser($DTO);

            return 'Вы зарегистрировались';
        } else {
            $password = $DTO->getPassword();
            $this->login($email, $password);

            return 'Вы уже были зарегистрированы';
        }
    }
}
