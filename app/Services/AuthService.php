<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(string $name, string $email, string $phone, string $password): bool
    {
        $newUser = User::query()->create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => Hash::make($password),
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

        if(Auth::attempt($credential)) {
            return true;
        } else {
            return false;
        }
    }
}
