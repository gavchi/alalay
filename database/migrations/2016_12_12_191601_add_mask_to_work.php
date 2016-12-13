<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaskToWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function ($table) {
            $table->integer('mask_id')->unsigned()->after('logo');
            $table->integer('order')->after('description')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function ($table) {
            $table->dropColumn('mask_id');
            $table->dropColumn('order');
        });
    }
}
