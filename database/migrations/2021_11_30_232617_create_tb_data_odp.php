<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDataOdp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_data_odp', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->string('indikator');
            $table->string('baseline');
            $table->string('targer');
            $table->string('lokasi');
            $table->string('anggaran');
            $table->string('sumber_pendanaan');
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
        Schema::dropIfExists('tb_data_odp');
    }
}
