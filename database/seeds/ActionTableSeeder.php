<?php

use Illuminate\Database\Seeder;
use App\Core\Domain\Action;
use App\Core\Domain\Goal;
use App\Core\Domain\Activity;

class ActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*******************************/
        Activity::create([            
            'description'=> 'Reading',
            'goal_id'=> 1
        ]);

        Activity::create([            
            'description'=> 'Writing',
            'goal_id'=> 2
        ]);

        Activity::create([            
            'description'=> 'Listening',
            'goal_id'=> 3
        ]);

        Activity::create([            
            'description'=> 'Speaking',
            'goal_id'=> 4
        ]);

        /*******************************/
        Action::create([
            'goal_id'=> 1,
            'activity_id'=> 1,
            'time'=> 300
        ]);

        Action::create([
            'goal_id'=> 1,
            'activity_id'=> 2,
            'time'=> 300
        ]);

        Action::create([
            'goal_id'=> 1,
            'activity_id'=> 3,
            'time'=> 300
        ]);

        Action::create([
            'goal_id'=> 1,
            'activity_id'=> 4,
            'time'=> 300
        ]);

        /*******************************/
    }
}
