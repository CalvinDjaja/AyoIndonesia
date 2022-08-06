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
        Schema::create('pemain_detail', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('posisi_pemain');
            $table->smallInteger('nomor_punggung');
            $table->unsignedBigInteger('tim_detail_id');
            $table->foreign('tim_detail_id')->references('id')->on('tim_detail')->onDelete('cascade');
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
        Schema::dropIfExists('pemain_detail');
    }
};
