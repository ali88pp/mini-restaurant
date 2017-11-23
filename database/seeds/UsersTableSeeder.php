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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');     
           
        \DB::table('role_has_permissions')->truncate();
        \DB::table('model_has_roles')->truncate();
        \DB::table('model_has_permissions')->truncate();
        \DB::table('roles')->truncate();
        \DB::table('permissions')->truncate();
        User::truncate();


        Role::create(['name' => 'administrator']);                
        $user = factory(User::class)->create([ 'username' => 'admin' ]);
        $user->assignRole('administrator');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
