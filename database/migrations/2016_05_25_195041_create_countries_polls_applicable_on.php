<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesPollsApplicableOn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_polls_applicable_on', function (Blueprint $table) {
            $table->integer('poll_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('countries_polls_applicable_on', function(Blueprint $table)
        {
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("countries_polls_applicable_on");
    }
}
