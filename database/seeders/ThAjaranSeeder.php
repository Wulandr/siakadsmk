<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThAjaranSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('th_ajaran')->insert([
            [
                'kode' => '2024A',
                'th_ajaran' => '2024/2025',
                'semester' => '1',
                'is_active' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => '2024B',
                'th_ajaran' => '2024/2025',
                'semester' => '2',
                'is_active' => 1, // aktif sekarang
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => '2025A',
                'th_ajaran' => '2025/2026',
                'semester' => '1',
                'is_active' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => '2025B',
                'th_ajaran' => '2025/2026',
                'semester' => '2',
                'is_active' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => '2026A',
                'th_ajaran' => '2026/2027',
                'semester' => '1',
                'is_active' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
