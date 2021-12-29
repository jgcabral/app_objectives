<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Domain\Action;
use App\Core\Domain\Activity;
use App\Core\Repository\IAction;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{


    private $iAction;

    public function __construct(IAction $actionRepository)
    {
        $this->iAction = $actionRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = new Action();                      
        $action->goal_id = $request->goal_id;        
        $action->time = $request->time;        
        $action->activity_id = $request->activity_id;  
        $action->save();

        return $action;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        
        $action = Action::find($request->action_id);        
        $action->activity_id = $request->activity_id;
        $action->time = $request->time;
        $action->save();

        return $action;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::find($id);

        $activity = Activity::find($action->activity_id);

        $activity->delete();
        
        $action->delete();

        
    }

    public function actionsByGoal($id){
        
        return $this->iAction->getActionsByGoal($id);      
                
    }

    public function actionsByActivity($id){
        
        return $this->iAction->getActionsByActivity($id);      
                
    }

    public function myActionsByGoal($id){
        
        return $this->iAction->getActionsByGoal($id);      
                
    }


    
}
