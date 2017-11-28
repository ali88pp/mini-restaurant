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


        Role::create(['name' => 'administrator']);                
        $admin = factory(User::class)->create([ 'username' => 'admin' ]);
        $admin->assignRole('administrator');

        Role::create(['name' => 'cashier']);  
        Role::create(['name' => 'waiter']);               
        $user = factory(User::class)->create([ 'username' => 'ad1' ]);
        $user->assignRole('cashier');
        $user->assignRole('waiter');


        factory(User::class, 10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
