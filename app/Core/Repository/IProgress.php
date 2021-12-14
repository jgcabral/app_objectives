<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IProgress{
    function progressByAction($id): String;
    function progressByGoal($id): String;
}

