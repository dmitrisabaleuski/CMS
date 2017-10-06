<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\User;
use App\Role;
use App\Permission;
class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
        $owner = new Role();
        $owner->name = 'User';
        $owner->display_name = 'User'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $SuperAdmin = new Role();
        $SuperAdmin->name         = 'SuperAdmin';
        $SuperAdmin->display_name = 'SuperAdministrator'; // optional
        $SuperAdmin->description  = 'User is allowed to manage and edit other users'; // optional
        $SuperAdmin->save();

        $admin = new Role();
        $admin->name         = 'Admin';
        $admin->display_name = 'Admin'; // optional
        $admin->description  = 'User is allowed to manage and edit posts'; // optional
        $admin->save();

        $SuperAdmin1 = (new User)->where('name', '=', 'SuperAdministrator')->first();

        // role attach alias
        $SuperAdmin1->attachRole($SuperAdmin1); // parameter can be an Role object, array, or id


        $createPost = new Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($createPost);
        // equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
        // equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        //Schema::drop('permission_role');
        //Schema::drop('permissions');
        //Schema::drop('role_user');
        //Schema::drop('roles');
    }
}
