<?php

use App\Post;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CMSDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->integer('parent_id');
            $table->timestamps();
        });
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content');
            $table->string('link');
            $table->string('author');
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author_name');
            $table->integer('author_id');
            $table->dateTime('date');
            $table->string('description');
            $table->string('content');
            $table->string('title');
            $table->timestamps();
        });
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            ((new Post)->fill([
                'name'=>$faker->name,
                'author_name'=>'SuperAdmin',
                'author_id'=>1,
                'description'=>$faker->text($maxNbChars = 50),
                'content'=>$faker->text($maxNbChars = 200),
                'title'=>$faker->name,
            ])->save());

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('user');
    }
}
