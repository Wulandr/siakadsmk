<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mapel')->insert([
            [
                'mapel' => 'Matematika',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mapel' => 'Bahasa Indonesia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mapel' => 'Bahasa Inggris',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mapel' => 'Pendidikan Agama Islam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mapel' => 'Bimbingan Konseling',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
