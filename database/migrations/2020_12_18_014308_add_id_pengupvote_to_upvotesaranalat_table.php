<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPengupvoteToUpvotesaranalatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upvotesaranalat', function (Blueprint $table) {
            $table->integer('id_pengupvote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upvotesaranalat', function (Blueprint $table) {
            $table->dropColumn('id_pengupvote');
        });
    }
}
