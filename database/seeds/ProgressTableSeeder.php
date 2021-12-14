<?php

use Illuminate\Database\Seeder;
use App\Core\Domain\Action;
use App\Core\Domain\Progress;

class ProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::create([
            'action_id'=> Action::all()->random()->id,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);
        
        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);
        
        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);
        
        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);


        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);

        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);
        
        Progress::create([
            'action_id'=> 1,
            'time'=> 15,            
        ]);
    }
}
