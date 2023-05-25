<?php

namespace App\Services;

use App\Models\User;
use App\Services\Dto\RegistrationNewUserDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(RegistrationNewUserDto $dto): bool
    {
        $newUser = User::query()->create([
            'name' => $dto->getName(),
            'phone' => $dto->getPhone(),
            'email' => $dto->getEmail(),
            'password' => Hash::make($dto->getPassword()),
        ]);

        Auth::login($newUser);

        return true;
    }

    public function login(string $email, string $password): bool
    {
        $credential = [
          'email' => $email,
          'password' => $password,
        ];

        return Auth::attempt($credential);
    }
}
