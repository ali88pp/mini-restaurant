<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        \DB::statement('SET FOREIGN_KEY_CHECKS=0');     
           
        \DB::table('role_has_permissions')->truncate();
        \DB::table('model_has_roles')->truncate();
        \DB::table('model_has_permissions')->truncate();
        \DB::table('roles')->truncate();
        \DB::table('permissions')->truncate();
        User::truncate();


        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'destroy permission']);
        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'destroy role']);
        Permission::create(['name' => 'view role']);


        Role::create(['name' => 'super-admin']);                
        $admin = factory(User::class)->create([ 'username' => 'admin' ]);
        $admin->assignRole('super-admin');

        Role::create(['name' => 'cashier']);  
        Role::create(['name' => 'waiter']);               
        $user = factory(User::class)->create([ 'username' => 'ad1' ]);
        $user->assignRole('cashier');
        $user->assignRole('waiter');


        factory(User::class, 10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
