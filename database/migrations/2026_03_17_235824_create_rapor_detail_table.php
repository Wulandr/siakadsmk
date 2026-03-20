<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaporDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapor_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_murid')
                ->constrained('murid')
                ->onDelete('cascade');

            $table->foreignId('id_th_ajaran')
                ->constrained('th_ajaran')
                ->onDelete('cascade');

            $table->foreignId('id_mapel')
                ->constrained('mapel')
                ->onDelete('cascade');

            // nilai akhir per mapel
            $table->decimal('nilai_akhir', 5, 2);

            // opsional
            $table->string('predikat')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('rapor_detail');
    }
}
