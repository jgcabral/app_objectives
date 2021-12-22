<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Domain\Progress;
use App\Core\Repository\IProgress;

use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{

    private $iProgress;

    public function __construct(IProgress $progressRepository)
    {
        $this->iProgress = $progressRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $progress = new Progress();        
        $progress->action_id = $request->action_id;  
        $progress->time = $request->time;               
        $progress->save();

        return $progress;
    }


    public function progressByAction($id){
        return json_encode($this->iProgress->progressByAction($id));                     

    }

    public function progressByGoal($id){
        
        return $this->iProgress->progressByGoal($id);                                             

    }

    public function progressByObjective($id){
                                                 
        return json_encode($this->iProgress->progressByObjective($id));                                             

    }
}
