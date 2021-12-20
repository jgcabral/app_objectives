<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IGoal{    
    function goalsByObjective($id): Collection;
    function myGoals($id): Collection;
    function myGoalsWithProgress($id): Collection;
}

