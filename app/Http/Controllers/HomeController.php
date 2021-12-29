<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Core\Repository\IObjective;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $iObjective;

    public function __construct(IObjective $objectiveRepository)
    {
        $this->iObjective = $objectiveRepository;
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objectives = $this->iObjective->allMyObjectives();

        if(count($objectives) > 0 ){
            return view('home');
        }else{
            return redirect('viewobjectives');
        }
        
    }

    public function viewObjectives()
    {
        return view('objectives');
    }


}
