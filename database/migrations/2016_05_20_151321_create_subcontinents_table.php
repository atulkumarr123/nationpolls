<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcontinentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcontinents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_region_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('subcontinents', function(Blueprint $table)
        {
            $table->foreign('parent_region_id')->references('id')->on('continents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("subcontinents");
    }
}
