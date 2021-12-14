<?php

namespace App\Core\Repository;

use App\Core\Domain\Objective;
use App\Core\Domain\Progress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObjectiveRepository implements IObjective{
    function all(): Collection{

        return Objective::all();
    }

    function allMyObjectives(): Collection
    {
        
        return Objective::addSelect([
            'progress'=> Progress::select(DB::raw("round(sum(progress.time) / goals.approach * 100 )"))
                                    ->join('actions','progress.action_id','actions.id') 
                                    ->join('goals','actions.goal_id','goals.id')                                                   
                                    ->whereColumn('goals.objective_id','objectives.id')
            ])
            ->join('goals','objectives.id','goals.objective_id')                                    
            ->join('actions','goals.id','actions.goal_id')  
            ->where('objectives.user_id','=', Auth::user()->id)
            ->groupBy('progress')                           
            ->get();
    }
}
