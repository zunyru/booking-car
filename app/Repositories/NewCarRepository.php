<?php

namespace App\Repositories;

use App\Models\NewCar;

class NewCarRepository
{
    public function getLimit($limit)
    {
        return NewCar::query()->limit($limit)->get();
    }
}
