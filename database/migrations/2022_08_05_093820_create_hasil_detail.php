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
        Schema::create('hasil_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertandingan_id');
            $table->foreign('pertandingan_id')->references('id')->on('pertandingan')->onDelete('cascade');
            $table->integer('rumah_skor_akhir');
            $table->integer('tamu_skor_akhir');
            $table->string('status_akhir_pertandingan');
            $table->unsignedBigInteger('pemain_pencentak_gol_terbanyak');
            $table->foreign('pemain_pencentak_gol_terbanyak')->references('id')->on('pemain_detail')->onDelete('cascade');
            $table->integer('akumulasi_kemenangan_home');
            $table->integer('akumulasi_kemenangan_away');
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
        Schema::dropIfExists('hasil_detail');
    }
};
