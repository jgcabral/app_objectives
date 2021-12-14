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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function progressByAction($id){
        return json_encode($this->iProgress->progressByAction($id));                     

    }

    public function progressByGoal($id){
        return json_encode($this->iProgress->progressByGoal($id));                                             

    }
}
