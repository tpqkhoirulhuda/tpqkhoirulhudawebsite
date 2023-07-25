<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->id('user_id')->primary();
            $table->id('buku_id')->primary();
            $table->id('kelas_id')->primary();
            $table->integer('tugas')->nullable();
            $table->integer('bacaan')->nullable();
            $table->integer('hafalan')->nullable();
            $table->integer('absen')->nullable();
            $table->integer('rata-rata_jilid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
