<?php

namespace App\GraphQl\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Error;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): \Illuminate\Contracts\Auth\Authenticatable
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(config('sanctum.guard', 'web'))
        $guard =  Auth::guard(config('sanctum.guard', 'api'));

        if( ! $guard->attempt($args)) {
            throw new Error('Invalid credentials.');
        }

        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var User $user
         */
        return $guard->user();
    }
}
