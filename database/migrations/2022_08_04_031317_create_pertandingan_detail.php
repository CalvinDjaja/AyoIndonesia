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
        Schema::create('pertandingan_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('rumah_skor');
            $table->integer('tamu_skor');
            $table->unsignedBigInteger('pemain_pencentak_gol');
            $table->foreign('pemain_pencentak_gol')->references('id')->on('pemain_detail')->onDelete('cascade');
            $table->unsignedBigInteger('pertandingan_id');
            $table->foreign('pertandingan_id')->references('id')->on('pertandingan')->onDelete('cascade');
            $table->time('waktu_gol');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertadingan_detail');
    }
};
