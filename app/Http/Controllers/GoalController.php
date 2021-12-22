<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Domain\Goal;
use App\Core\Repository\IGoal;


class GoalController extends Controller
{

    private $iGoal;

    public function __construct(IGoal $goalRepository)
    {
        $this->iGoal = $goalRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goal = new Goal();
        $goal->objective_id = $request->objective_id;        
        $goal->description = $request->description;    
        $goal->approach = $request->approach;        
        $goal->save();

        return $goal;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $goal = Goal::find($request->goal_id);
        $goal->approach = $request->approach;
        $goal->description = $request->description;
        $goal->save();

        return $goal;
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goalsByObjective($id)
    {
        return $this->iGoal->goalsByObjective($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myGoals($id)
    {
        return $this->iGoal->myGoals($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myGoalsWithProgress($id)
    {
        return $this->iGoal->myGoalsWithProgress($id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goal = Goal::find($id);
        
        $goal->delete();
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function closeGoal(Request $request)
    {
        $goal = Goal::find($request->goal_id);
  
        $goal->finished = 1;        
        $goal->save();

        return $goal;
    }

}
