<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            // relasi ke murid
            $table->foreignId('id_murid')
                ->constrained('murid')
                ->onDelete('cascade');

            // relasi ke mapel
            $table->foreignId('id_mapel')
                ->constrained('mapel')
                ->onDelete('cascade');

            // jenis nilai
            $table->enum('jenis_nilai', ['tugas', 'uts', 'uas']);

            // nilai
            $table->decimal('nilai', 5, 2);

            $table->foreignId('id_th_ajaran')
                ->constrained('th_ajaran')
                ->onDelete('cascade');

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
        Schema::dropIfExists('nilai');
    }
}
