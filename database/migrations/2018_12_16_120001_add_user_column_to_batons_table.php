<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserColumnToBatonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('batons', function (Blueprint $table) {
            $table->integer('twitter_id')->after('id');
            $table->foreign('twitter_id')
                ->references('twitter_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('batons', function (Blueprint $table) {
            //
        });
    }
}
