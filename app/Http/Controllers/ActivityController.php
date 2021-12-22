<?php

namespace App\Http\Controllers;

use App\Core\Domain\Activity;
use App\Core\Repository\IActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $iActivity;

    public function __construct(IActivity $activityRepository)
    {
        $this->iActivity = $activityRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->description = $request->description;
        $activity->goal_id = $request->goal_id;
        $activity->save();

        return $activity;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    public function activitiesByGoal($id){
        return $this->iActivity->activitiesByGoal($id);        
    }
    
}
