<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppk', function (Blueprint $table) {
            $table->integerIncrements('id_sppk');
            $table->integer('tujuan_investasi');
            $table->integer('besar_return');
            $table->integer('jangka_waktu');
            $table->integer('toleransi_resiko');
            $table->integer('ketergantungan_hasil');
            $table->string('profil_resiko',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppk');
    }
}
