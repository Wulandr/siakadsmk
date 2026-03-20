<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAssigmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_assignment')->insert(
            [
                'id' => 1,
                'id_user' => 1,
                'id_role' => '1',
            ],
            [
                'id' => 2,
                'id_user' => 1,
                'id_role' => '2',
            ],

            [
                'id' => 3,
                'id_user' => 2,
                'id_role' => '2',
            ],
            [
                'id' => 4,
                'id_user' => 2,
                'id_role' => '4',
            ],
        );
    }
}
