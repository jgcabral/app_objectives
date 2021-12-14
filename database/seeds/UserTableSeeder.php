<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Juan',
            'email'=>'jgc1984@gmail.com',
            'password'=> bcrypt('12345678')
        ]);
    }
}
