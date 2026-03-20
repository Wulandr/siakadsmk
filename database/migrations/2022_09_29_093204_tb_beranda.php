<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbBeranda extends Migration
{
    public function up()
    {
        Schema::create('beranda', function (Blueprint $table) {
            $table->id();
            $table->string('judul_beranda')->nullable();
            $table->longText('about_beranda')->nullable();
            $table->string('judul_kegiatan')->nullable();
            $table->longText('about_kegiatan')->nullable();
            $table->string('judul_mitra')->nullable();
            $table->longText('about_mitra')->nullable();
            $table->string('judul_berita')->nullable();
            $table->longText('about_berita')->nullable();
            $table->string('map')->nullable();
            $table->string('link_eksternal')->nullable();
            $table->string('link_internal')->nullable();
            $table->longText('kontak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beranda');
    }
}
