<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthRelatedFieldsToPollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('isPublishedByAdmin')->default(false);
            $table->boolean('isPublished')->default(false);
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
            $table->dropColumn('isPublished');
            $table->dropColumn('isPublishedByAdmin');
            $table->dropColumn('user_id');
        });
    }
}
