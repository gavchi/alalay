<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->text('title');
            $table->text('keywords');
            $table->text('description');
            $table->text('robots');
            $table->text('copyright');
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
        Schema::drop('seo');
    }
}
