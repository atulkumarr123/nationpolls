<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_polls', function (Blueprint $table) {
            $table->integer('option_id')->unsigned()->index();
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->integer('poll_id')->unsigned()->index();
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
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
        Schema::drop('options_polls');
    }
}
