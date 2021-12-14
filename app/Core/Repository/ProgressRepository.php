<?php

namespace App\Core\Repository;

use App\Core\Domain\Objective;
use App\Core\Domain\Progress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class ProgressRepository implements IProgress{
    
    function progressByAction($id): String
    {
        
        $progress =  Progress::select(DB::raw("round(sum(progress.time) / goals.approach * 100 )progress"))
                                    ->join('actions','progress.action_id','actions.id') 
                                    ->join('goals','actions.goal_id','goals.id')                                                                                       
                                    ->where('progress.action_id', $id)                         
                                    ->get();

        return json_encode($progress[0]);

    }

    function progressByGoal($id): String
    {
        
        $progress =  Progress::select(DB::raw("round(sum(progress.time) / goals.approach * 100 )progress"))
                                    ->join('actions','progress.action_id','actions.id') 
                                    ->join('goals','actions.goal_id','goals.id')                                                                                       
                                    ->where('goals.id', $id)                         
                                    ->get();

        return $progress[0];

    }
}
