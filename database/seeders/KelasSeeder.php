<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'nama_kelas' => 'X A',
                'wali_kelas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kelas' => 'X B',
                'wali_kelas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kelas' => 'X C',
                'wali_kelas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kelas' => 'XI A',
                'wali_kelas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_kelas' => 'XII A',
                'wali_kelas' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
