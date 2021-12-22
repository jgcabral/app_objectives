<?php

namespace App\Core\Repository;

use App\Core\Domain\Goal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoalRepository implements IGoal{
    
    function goalsByObjective($id): Collection
    {
        
        return Goal::addSelect(['goals.id'=> 'goals.id',
                                'goals.description'=> 'goals.description',                                                                
                                'goals.finished'=> 'goals.finished',
                                'goals.objective_id'=> 'goals.objective_id',
                                'goals.id as goal_id'=> 'goals.id as goal_id',
                                'goals.approach'=> 'goals.approach',
                                ])                                
                   ->where('goals.objective_id','=', $id)                         
            ->get();
    }

    function myGoals($id): Collection
    {
        
        return Goal::where('goals.objective_id','=', $id)                                             
                    ->get();
        
                   
    }

    function myGoalsWithProgress($id): Collection
    {
        
        return Goal::addSelect(['goals.id'=> 'goals.id',
                                'goals.description'=> 'goals.description',                                                                
                                'goals.finished'=> 'goals.finished',
                                'goals.objective_id'=> 'goals.objective_id',
                                'goals.id as goal_id'=> 'goals.id as goal_id',
                                'progress'=> 
                                DB::raw('   (select (round(sum(progress.time) / goals.approach * 100 ))
                                            from progress 
                                            inner join actions on progress.action_id = actions.id
                                            where actions.goal_id = goals.id
                                            )progress'
                                        ) 
                                ])                      
                    ->where('goals.objective_id','=', $id)                                             
                    ->get();
        
                   
    }
}
