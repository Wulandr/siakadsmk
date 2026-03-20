<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 1, //admin
                'is_aktif' => 1,
                'email_verified_at' => null,
                'password' => '$2y$10$llPcvyVbOKx9DbIDubyKlOwyMEC.8ThhNW9hitGpoWO9gO36EJ.36', //wulandari
                'remember_token' => 'GIiCppjOxvNbqWL6NeRJ1VIZRhlOPWE8rOhWQrV5Y0RNH3aEIoKEnqhtM56f'
            ],
        ); //guys user seeder g bisa masuk
        $user->find('role', 1)->assignRole('Admin');
    }
}
