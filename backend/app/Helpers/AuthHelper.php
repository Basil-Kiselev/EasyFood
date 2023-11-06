<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class AuthHelper
{
    public static function fingerprint(): string
    {
        $seed = Cookie::get('s');

        if (is_null($seed)) {
            $seed = Str::random();
            Cookie::queue(\cookie()->forever('s', $seed));
        }

        return sha1(implode('|', [
            request()->ip(),
            request()->userAgent(),
            request()->route()->getDomain(),
            $seed,
        ]));
    }
}
