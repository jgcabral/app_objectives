<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function viewObjectives()
    {
        return view('objectives');
    }


    public function myGoals($id){
         
        return DB::table('goals')
                ->where('objective_id', $id)
                ->get()
                ;
    }

    public function actionsByGoal($id){
        
        $actions =  DB::table('actions')
                ->where('goal_id', $id)
                ->limit(1)
                ->get()                
                ;
        return json_encode($actions[0]);
                
    }

}
