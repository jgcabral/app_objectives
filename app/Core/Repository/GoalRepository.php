<?php

namespace App\Core\Repository;

use App\Core\Domain\Goal;
use App\Core\Domain\Action;
use App\Core\Domain\Progress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class GoalRepository implements IGoal{
    
    function goalsByObjective($id): Collection
    {
        
        return Goal::addSelect(['goals.id'=> 'goals.id',
                                'goals.description'=> 'goals.description',                                                                
                                'goals.finished'=> 'goals.finished',
                                'goals.objective_id'=> 'goals.objective_id',
                                'goals.id as goal_id'=> 'goals.id as goal_id',
                                'goals.approach'=> 'goals.approach',
                                'action' => Action::select(DB::raw('count(1)'))
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
                                'progress'=> Progress::select(DB::raw("(case 
                                                                            when sum(progress.time) = 30 then '00:30:00' 
                                                                            when sum(progress.time) = 45 then '00:45:00'
                                                                            when sum(progress.time) = 60 then '01:00:00' 
                                                                            when sum(progress.time) = 75 then '01:15:00' 
                                                                            when sum(progress.time) = 90 then '01:30:00' 
                                                                            when sum(progress.time) = 105 then '01:45:00' 
                                                                            when sum(progress.time) = 120 then '02:00:00' 
                                                                            when sum(progress.time) = 135 then '02:15:00' 
                                                                            when sum(progress.time) = 150 then '02:30:00' 
                                                                            when sum(progress.time) = 165 then '02:45:00' 
                                                                        end
                                                                        )"))
                                                        ->join('actions','progress.action_id','actions.id')                                                                                      
                                                        ->whereColumn('actions.goal_id','goals.id')                                                                           
                                ])                       
                    ->where('goals.objective_id','=', $id)                                             
                    ->get();
        
                   
    }
}
