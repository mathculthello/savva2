<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Savva\User();
        $user->name = 'egor';
        $user->email = 'egor@egor.cf';
        $user->password = Hash::make('leonardo');
        $user->save();
    }
}
