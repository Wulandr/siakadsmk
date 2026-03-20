<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BerandaSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('beranda')->insert(
            [
                [
                'judul_beranda' => "Mapping Mitra Universitas Sebelas Maret",
                'about_beranda' => "Kami memaparkan informasi-informasi tentang Mitra Kami di seluruh Indonesia.
                                    Bersama-sama kita membangun kerjasama untuk memajukan bangsa dari berbagai sektor.",
                'judul_kegiatan' => "Start-to-end app development agency",
                'about_kegiatan' => "Pellentesque posuere vestibulum lorem, ut efficitur erat tristique sed. Ut vitae tincidunt ante.",
                'judul_mitra' => "Our Partners",
                'about_mitra' => "Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi erat.",
                'judul_berita' => "Berita Terakhir",
                'about_berita' => "Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi erat.",
                'map' => "",
                'link_eksternal' => "",
                'link_internal' => "",
                'kontak' => "",
                ],
            ],
        );
    }
}
