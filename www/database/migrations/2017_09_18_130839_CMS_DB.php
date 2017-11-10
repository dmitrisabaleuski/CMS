<?php

use App\Model\Article;
use App\Model\User;
use App\Model\Menu;
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
            $table->integer('active_id');
            $table->integer('active');
            $table->timestamps();
        });
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content');
            $table->string('link');
            $table->string('author');
            $table->integer('active_menu');
            $table->timestamps();
        });
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('author_name');
            $table->integer('author_id');
            $table->dateTime('date');
            $table->string('description');
            $table->string('content');
            $table->string('title');
            $table->string('view_on_main');
            $table->string('parent_page');
            $table->timestamps();
        });
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            ((new Article)->fill([
                'name'=>$faker->name,
                'author_name'=>'SuperAdmin',
                'author_id'=>1,
                'description'=>$faker->text($maxNbChars = 50),
                'content'=>$faker->text($maxNbChars = 200),
                'title'=>$faker->name,
                'view_on_main'=>'1',
                'parent_page'=>'',
            ])->save());

        }
        $menu = new Menu;
        $menu->fill([
            'title'=>'Главная',
            'url'=>'/',
            'active_id'=>1,
            'active'=>1,
        ]);
        $menu->save();

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
