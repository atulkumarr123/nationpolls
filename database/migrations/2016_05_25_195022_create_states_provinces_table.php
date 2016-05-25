<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_provinces', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_region_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('states_provinces', function(Blueprint $table)
        {
            $table->foreign('parent_region_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("states_provinces");

    }
}
