<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Domain\Objective;
use App\Core\Repository\IObjective;
use App\Core\Domain\Progress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ObjectiveController extends Controller
{
    private $iObjective;

    public function __construct(IObjective $objectiveRepository)
    {
        $this->iObjective = $objectiveRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Objective::all();
        return $this->iObjective->allMyObjectives();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objective = new Objective();        
        $objective->description = $request->description;  
        $objective->user_id = Auth::user()->id;  
        $objective->save();

        return $objective;
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
        $objective = Objective::find($request->id);
        $objective->description = $request->description;
        $objective->save();

        return $objective;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objective = Objective::find($id);
        
        $objective->delete();

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myObjectivesWithProgress()
    {                
        return $this->iObjective->allMyObjectivesWithProgress(); 
    }
}
