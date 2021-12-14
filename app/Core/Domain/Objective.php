<?php

namespace App\Core\Domain;

use Illuminate\Database\Eloquent\Model;


class Objective extends Model
{
    /**
     * @var string
     */
    private $value;

    public function getValue(): string
    {
        return $this->value;
    }
}
