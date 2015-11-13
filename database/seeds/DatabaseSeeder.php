<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::truncate();
        //factory(User::class,50)->create();

        //Model::reguard();

        Eloquent::unguard();
        $this->call('ItemsTableSeeder');
    }
}
