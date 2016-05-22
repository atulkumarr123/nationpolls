<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function(Blueprint $table) {
            $table->increments('id');
            $table->string('country_iso_code');
            $table->string('name');
            $table->integer('parent_region_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('countries', function(Blueprint $table)
        {
            $table->foreign('parent_region_id')->references('id')->on('subcontinents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("countries");
    }
}
