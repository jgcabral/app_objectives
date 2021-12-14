<?php

namespace App\Core\Repository;
use Illuminate\Database\Eloquent\Collection;

interface IObjective{
    function all(): Collection;
    function allMyObjectives(): Collection;
}

