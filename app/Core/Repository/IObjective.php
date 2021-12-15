<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IObjective{
    function allMyObjectives(): Collection;
    function allMyObjectivesWithProgress(): Collection;
}

