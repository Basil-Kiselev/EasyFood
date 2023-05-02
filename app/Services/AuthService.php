<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(string $name, string $email, string $phone, string $password): string
    {
        $newUser = User::query()->create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Auth::login($newUser);

        return redirect(route('home'));
    }
}
