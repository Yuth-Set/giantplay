<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name'           => 'Admin',
            'email'          => 'syuth89@gmail.com',
            'type'           => 'admin',
            'password'       => bcrypt('@Kampot5168'),
            'remember_token' => '',
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now()
        ]);
    }
}
