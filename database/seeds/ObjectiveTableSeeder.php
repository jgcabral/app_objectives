<?php

use Illuminate\Database\Seeder;
use App\Core\Domain\Objective;

class ObjectiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objective::create([
            'description'=> 'Inglés - A2',   
            'user_id' => 1
        ]);
                

    }
}
