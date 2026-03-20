<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThAjaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('th_ajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // contoh: 2526A
            $table->string('thn_ajaran');     // contoh: 2025/2026
            $table->enum('semester', ['1', '2']);
            $table->boolean('is_active')->default(false);

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
        Schema::dropIfExists('th_ajaran');
    }
}
