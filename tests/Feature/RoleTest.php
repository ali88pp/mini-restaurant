<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function administrator_can_create_role()
    {
        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->postJson('role/create', [ 'name' => 'manager'])
            ->assertStatus(201);

        $this->assertDatabaseHas('roles', [ 'name' => 'manager' ]);
    }

    /** @test */
    public function authorized_user_can_create_role()
    {
        Permission::create(['name' => 'create role']);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('create role');

        $this->actingAs($user);

        $this->postJson('role/create', [ 'name' => 'manager'])
            ->assertStatus(201);

        $this->assertDatabaseHas('roles', [ 'name' => 'manager' ]);
    }

    /** @test */
    public function unauthorized_user_cannot_create_role()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);

        $this->actingAs($user);

        $this->postJson('role/create', [ 'name' => 'manager'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('roles', [ 'name' => 'manager' ]);
    }

    /** @test */
    public function administrator_can_update_role()
    {
        $role = Role::create([ 'name' => 'manager wrong' ]);
        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->putJson('role/edit/' . $role->id, [ 'name' => 'manager'])
            ->assertStatus(200);

        $this->assertDatabaseHas('roles', [ 'id' => $role->id, 'name' => 'manager' ]);
    }

    /** @test */
    public function authorized_user_can_update_role()
    {
        Permission::create(['name' => 'edit role']);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('edit role');

        $this->actingAs($user);

        $role = Role::create([ 'name' => 'manager wrong' ]);

        $this->putJson('role/edit/' . $role->id, [ 'name' => 'manager'])
            ->assertStatus(200);

        $this->assertDatabaseHas('roles', [ 'name' => 'manager' ]);
    }

    /** @test */
    public function unauthorized_user_cannot_update_role()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);

        $this->actingAs($user);

        $role = Role::create([ 'name' => 'manager wrong' ]);

        $this->putJson('role/edit/' . $role->id, [ 'name' => 'manager'])
            ->assertStatus(403);
    }

    /** @test */
    public function administrator_can_view_role()
    {
        Role::create([ 'name' => 'manager']);
        Role::create([ 'name' => 'staff']);
        Role::create([ 'name' => 'cashier']);

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->postJson('role')->assertStatus(200);
    }

    /** @test */
    public function authorized_can_view_role()
    {
        Role::create([ 'name' => 'manager']);
        Role::create([ 'name' => 'staff']);
        Role::create([ 'name' => 'cashier']);

        Permission::create(['name' => 'view role']);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('view role');
        
        $this->actingAs($user);

        $this->postJson('role')->assertStatus(200);
    }

    /** @test */
    public function unauthorized_cannot_view_role()
    {
        Role::create([ 'name' => 'manager']);
        Role::create([ 'name' => 'staff']);
        Role::create([ 'name' => 'cashier']);

        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $this->postJson('role')->assertStatus(403);
    }
}
