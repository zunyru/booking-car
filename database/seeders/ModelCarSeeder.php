<?php

namespace Database\Seeders;

use App\Models\ModelCar;
use Illuminate\Database\Seeder;

class ModelCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //รูปแบบที่ 1
        $model_car = new ModelCar();
        $model_car->name = 'HONDA';
        $model_car->save();

        //รูปแบบที่ 2
        ModelCar::query()->create(['name' => 'TOYOTA']);

        //รูปแบบที่ 3
        ModelCar::query()->insert(['name' => 'MITSUBISHI']);

        //รูปแบบที่ 4
        ModelCar::query()->forceCreate(['name' => 'MERCEDES']);

    }
}
