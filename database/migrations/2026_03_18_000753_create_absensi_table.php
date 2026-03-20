<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            // murid
            $table->foreignId('id_murid')
                ->constrained('murid')
                ->onDelete('cascade');

            // tahun ajaran
            $table->foreignId('id_th_ajaran')
                ->constrained('th_ajaran')
                ->onDelete('cascade');

            // tanggal
            $table->date('tanggal');

            // jenis absensi
            $table->enum('jenis', ['hadir', 'sakit', 'izin', 'alpha']);
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
        Schema::dropIfExists('absensi');
    }
}
