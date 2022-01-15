<?php

namespace App\Repositories;

use App\Models\ModelCar;

class ModelCarRepository
{
    public function getAll()
    {
        return ModelCar::query()->get();
    }
}
