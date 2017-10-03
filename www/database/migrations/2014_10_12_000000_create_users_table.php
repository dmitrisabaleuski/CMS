<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        ((new User)->fill([
            'name'=>'Administrator',
            'email'=>'dmitrisabaleuski@gmail.com',
            'password'=>'$2y$10$dsbsizRB3X0SvLUPK.ZLiOolMNYTwhBc/dqe16bHUTfd98VkVNS7S',
        ])->save());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
