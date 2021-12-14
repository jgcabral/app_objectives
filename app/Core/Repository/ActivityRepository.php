<?php

namespace App\Core\Repository;

use App\Core\Domain\Activity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityRepository implements IActivity{

    function activitiesByGoal($id): Collection
    {
        return Activity::where('activities.goal_id', $id)->get();
    }
}
