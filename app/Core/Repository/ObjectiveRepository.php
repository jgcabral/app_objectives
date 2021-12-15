<?php

namespace App\Core\Repository;

use App\Core\Domain\Objective;
use App\Core\Domain\Progress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObjectiveRepository implements IObjective{
    function allMyObjectives(): Collection{

        return Objective::select(['objectives.id', 'objectives.description'])  
            ->where('objectives.user_id','=', Auth::user()->id)                           
            ->get();
    }

    function allMyObjectivesWithProgress(): Collection
    {
        
        return Objective::addSelect([
            'progress'=> Progress::select(DB::raw("round(sum(progress.time) / goals.approach * 100 )"))
                                    ->join('actions','progress.action_id','actions.id') 
                                    ->join('goals','actions.goal_id','goals.id')                                                   
                                    ->whereColumn('goals.objective_id','objectives.id')
                                    
            ])            
            ->where('objectives.user_id','=', Auth::user()->id)                                      
            ->get();
    }
}
