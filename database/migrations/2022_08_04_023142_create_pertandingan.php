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
        Schema::create('pertandingan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pertandingan');
            $table->time('waktu_pertandingan');
            $table->time('selesai_waktu_pertandingan');
            $table->unsignedBigInteger('tim_tuan_rumah');
            $table->foreign('tim_tuan_rumah')->references('id')->on('tim_detail')->onDelete('cascade');
            $table->unsignedBigInteger('tim_tamu');
            $table->foreign('tim_tamu')->references('id')->on('tim_detail')->onDelete('cascade');
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
        Schema::dropIfExists('pertadingan');
    }
};
