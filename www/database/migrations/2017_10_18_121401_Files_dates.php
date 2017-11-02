<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilesDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mimetype');
            $table->string('link');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mimetype');
            $table->string('link');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mimetype');
            $table->string('link');
            $table->integer('user_id');
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
        //
    }
}
