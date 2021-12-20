<?php

namespace App\Core\Repository;

use Illuminate\Database\Eloquent\Collection;

interface IAction{
    
    function getActionsByGoal($id): Collection;
    function getActionsByActivity($id): Collection;
    
}

