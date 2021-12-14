<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IActivity{    
    function activitiesByGoal($id): Collection;
}

