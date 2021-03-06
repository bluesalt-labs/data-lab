<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'System Administrator',
            'slug'          =>  'system_admin',
            'permissions'   => array(
                'dashboard'     => true,

                'user-create'  => true,
                'user-read'    => true,
                'user-update'  => true,
                'user-delete'  => true,

                'role-create'   => true,
                'role-read'     => true,
                'role-update'   => true,
                'role-delete'   => true,

                'app-create'    => true,
                'app-read'      => true,
                'app-update'    => true,
                'app-delete'    => true,

                'data-create'   => true,
                'data-read'     => true,
                'data-update'   => true,
                'data-delete'   => true,
            ),
        ]);

        Role::create([
            'name'          => 'User',
            'slug'          => 'user',
            'permissions'   => array(
                'dashboard'     => true,

                'app-create'   => true,
                'app-read'     => true,
                'app-update'   => true,
                'app-delete'   => true,

                'data-create'   => true,
                'data-read'     => true,
                'data-update'   => true,
                'data-delete'   => true,
            ),
        ]);

        Role::create([
            'name'          => 'New Account',
            'slug'          => 'new_account',
            'permissions'   => array(
                'dashboard'     => true,

                'app-read'     => true,
                'data-read'    => true,
            ),
        ]);

        Role::create([
            'name'          => 'Guest',
            'slug'          => 'guest',
            'permissions'   => array(),
        ]);
    }
}
