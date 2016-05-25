<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGeoLocsIdToPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls', function ($table) {
            $table->integer('geo_locs_id')->unsigned();
            $table->foreign('geo_locs_id')->references('id')->on('geo_locs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polls', function ($table) {
            $table->dropForeign('polls_geo_locs_id_foreign');
            $table->dropColumn('geo_locs_id');
        });
    }
}
