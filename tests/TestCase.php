<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;
    use MakesGraphQLRequests;

    public function login(?User $user = null): User
    {
        $user ??= User::factory()->create();

        Sanctum::actingAs($user);

        return $user;
    }
}
