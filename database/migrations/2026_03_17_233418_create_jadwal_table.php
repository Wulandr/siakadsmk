<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_mapel');
            $table->unsignedBigInteger('id_guru');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('hari', [
                'senin',
                'selasa',
                'rabu',
                'kamis',
                'jumat',
                'sabtu'
            ]);
            $table->time('jam_mulai');
            $table->time('jam_selesai');

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
        Schema::dropIfExists('jadwal');
    }
}
