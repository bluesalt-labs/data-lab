<?php

use Illuminate\Database\Seeder;
use App\Role;

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
                'data.*'    => true,
                'user.*'    => true,
                'role.*'    => true,
            ),
        ]);

        Role::create([
            'name'          => 'User',
            'slug'          => 'user',
            'permissions'   => array(
                'data.*'    => true,
            ),
        ]);

        Role::create([
            'name'          => 'New Account',
            'slug'          => 'new_account',
            'permissions'   => array(
                'data.index'    => true,
                'data.getByID'  => true,
            ),
        ]);

        Role::create([
            'name'          => 'Guest',
            'slug'          => 'guest',
            'permissions'   => array(
                'data.index'    => true,
                'data.getByID'  => true,
            ),
        ]);
    }
}
