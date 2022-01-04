<?php

namespace App\Core\Repository;

use App\Core\Domain\Objective;
use App\Core\Domain\Progress;
use App\Core\Domain\Goal;
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
                'progress'=> Goal::select(DB::raw("round(count(objective_id) / 
                                                ( select count(*) from goals where goals.objective_id = objectives.id ) * 100) "
                                                 )
                                         )                                                                                           
                                        ->where('goals.finished',  1)
                                        ->whereColumn('goals.objective_id','objectives.id')
                                        
                ])                            
                ->where('objectives.user_id','=', Auth::user()->id)                                      
                ->get();    
    }
}
