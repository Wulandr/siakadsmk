<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'nip' => '19800101',
                'nama' => 'Ahmad Fauzi',
                'jabatan' => 'Wali Kelas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nip' => '19800102',
                'nama' => 'Siti Aminah',
                'jabatan' => 'Guru BK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nip' => '19800103',
                'nama' => 'Budi Santoso',
                'jabatan' => 'Wali Kelas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nip' => '19800104',
                'nama' => 'Dewi Lestari',
                'jabatan' => 'Wali Kelas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nip' => '19800105',
                'nama' => 'Rizky Hidayat',
                'jabatan' => 'Guru BK',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
