<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create2OptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2_options', function (Blueprint $table) {
//            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('poll_id')->unsigned();
            $table->string('option_1');
            $table->string('option_2');
            $table->timestamps();
        });

        Schema::table('2_options', function(Blueprint $table)
        {
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("2_options");
    }
}
