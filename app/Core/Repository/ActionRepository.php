<?php

namespace App\Core\Repository;


use App\Core\Domain\Action;
use App\Core\Domain\Activity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ActionRepository implements IAction{
    
    function getActionsByGoal($id): Collection{

        return Action::addSelect([
            'activities.description'=> 'activities.description',
            'actions.time'=> 'actions.time',
            'actions.id'=> 'actions.id'                                                                                                                                                                                                                                                                                                                                                                                          
                                
             ])   
                                         
            ->join('activities','actions.id', 'activities.id')
            ->join('goals','actions.goal_id', 'goals.id')                                    
            ->where('goals.id','=', $id)                                                  
            ->get();  
    }

    function getActionsByActivity($id): Collection{

        return Action::addSelect([
            'activities.description'=> 'activities.description',
            'actions.time'=> 'actions.time',
            'actions.id'=> 'actions.id'                                                                                                                                                                                                                                                                                                                                                                                          
                                
             ])   
                                         
            ->join('activities','actions.id', 'activities.id')            
            ->where('activities.id','=', $id)                                              
            ->get();  
    }

    
}