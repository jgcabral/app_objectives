<?php

namespace App\Core\Repository;

use App\Core\Domain\Goal;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoalRepository implements IGoal{
    
    function goalsByObjective($id): Collection
    {
        
        return Goal::where('goals.objective_id','=', $id)                         
            ->get();
    }
}
