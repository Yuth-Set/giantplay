<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type')->default('user');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        /*User::create([
    'name'           => 'Admin',
    'email'          => 'syuth89@gmail.com',
    'type'           => 'admin',
    'password'       => bcrypt('@Kampot5168'),
    'remember_token' => '',
    'created_at'     => Carbon::now(),
    'updated_at'     => Carbon::now()
    ]);*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }
}
