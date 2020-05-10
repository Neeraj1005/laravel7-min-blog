<?php

use App\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'id' => 1,
                'name' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'editor',
            ],
            [
                'id' => 3,
                'name' => 'writer',
            ],
            [
                'id' => 4,
                'name' => 'subscriber',
            ],
            [
                'id' => 5,
                'name' => 'manager',
            ],
        ];

        Role::insert($role);
    }
}
