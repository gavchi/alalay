<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderToClientsAndTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function ($table) {
            $table->integer('order')->after('image')->unsigned()->default(0);
        });
        Schema::table('members', function ($table) {
            $table->integer('order')->after('image')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function ($table) {
            $table->dropColumn('order');
        });
        Schema::table('members', function ($table) {
            $table->dropColumn('order');
        });
    }
}
