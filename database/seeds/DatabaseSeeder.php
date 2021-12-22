<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ObjectiveTableSeeder::class);
        $this->call(GoalTableSeeder::class);
        //$this->call(ActionTableSeeder::class);
    }
}
