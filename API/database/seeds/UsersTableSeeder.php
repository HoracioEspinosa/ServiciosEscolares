<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Horacio Espinosa';
        $user->email = 'dar5_0094@hotmail.com';
        $user->phone = '9988958202';
        $user->password = bcrypt('secret');
        $user->save();
    }
}