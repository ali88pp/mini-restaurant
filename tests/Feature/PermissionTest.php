<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }

    /** @test */
    public function administrator_can_create_permission()
    {
        $user = $this->createSuperAdministrator();

        $this->actingAs($user);

        $this->postJson('permission/create', [ 'name' => 'create user'])
            ->assertStatus(201);

        $this->assertDatabaseHas('permissions', [ 'name' => 'create user' ]);
    }

    /** @test */
    public function authorized_user_can_create_permission()
    {
        Permission::create(['name' => 'create permission']);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('create permission');

        $this->actingAs($user);

        $this->postJson('permission/create', [ 'name' => 'create user'])
            ->assertStatus(201);

        $this->assertDatabaseHas('permissions', [ 'name' => 'create user' ]);
    }

    /** @test */
    public function unauthorized_user_cannot_create_permission()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);

        $this->actingAs($user);

        $this->postJson('permission/create', [ 'name' => 'create user'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('permissions', [ 'name' => 'create user' ]);
    }

    /** @test */
    public function administrator_can_view_permissions()
    {
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'destroy permission']);

        $user = $this->createSuperAdministrator();

        $this->actingAs($user);

        $this->postJson('permissions')
            ->assertStatus(200);
    }

    /** @test */
    public function authorized_can_view_permissions()
    {
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'destroy permission']);
        Permission::create(['name' => 'view permission']);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('view permission');

        $this->actingAs($user);

        $this->postJson('permissions')
            ->assertStatus(200);
    }

    /** @test */
    public function unauthorized_cannot_view_permissions()
    {
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'destroy permission']);
        Permission::create(['name' => 'view permission']);
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);

        $this->actingAs($user);

        $this->postJson('permissions')
            ->assertStatus(403);
    }
}
