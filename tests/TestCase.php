<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createSuperAdministrator()
    {
        Role::create(['name' => 'super-admin']);
        $user = factory(User::class)->create(['username' => 'admin']);
        $user->assignRole('super-admin');

        return $user;
    }
}
