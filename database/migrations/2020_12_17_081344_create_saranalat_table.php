<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaranalatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saranalat', function (Blueprint $table) {
            $table->integerIncrements('id_saranalat');
            $table->integer('id_pembuat');
            $table->string('nama_alat',250);
            $table->string('deskripsi_alat',1000);
            $table->dateTime('tanggal_saranalat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saranalat');
    }
}
