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

        
        Objective::create([
            'description'=> 'Malagata - Luciernaga',   
            'user_id' => 1
        ]);
        
        Objective::create([
            'description'=> 'Sombras - Triste Novela',   
            'user_id' => 1
        ]);

        Objective::create([
            'description'=> '7 Lunas - Costañera',   
            'user_id' => 1
        ]);

        Objective::create([
            'description'=> '7 Lunas - Loco Corazón',   
            'user_id' => 1
        ]);
        

    }
}
