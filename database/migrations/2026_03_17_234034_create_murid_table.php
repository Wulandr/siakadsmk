<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murid', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_th_ajaran');
            $table->string('nis')->unique();
            $table->string('nama');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_th_ajaran')->references('id')->on('th_ajaran')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('murid');
    }
}
