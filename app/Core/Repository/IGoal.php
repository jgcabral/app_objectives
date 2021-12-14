<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IGoal{    
    function goalsByObjective($id): Collection;
}

