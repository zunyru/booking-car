<?php

namespace App\Repositories;

use App\Models\Car;

class CarRepository
{
    public function store($params)
    {
        $data = new Car();

        return $this->valiable($data, $params);
    }

    public function valiable(Car $data, $params)
    {
        $params = (object)$params;

        !isset($params->car_name) ?: $data->car_name = $params->car_name;
        !isset($params->model_car_id) ?: $data->model_car_id = $params->model_car_id;
        !isset($params->no_car) ?: $data->no_car = $params->no_car;
        !isset($params->price) ?: $data->price = $params->price;
        !isset($params->stock) ?: $data->stock = $params->stock;

        return $data->save();
    }

    public function delete(Car $data)
    {
        return $data->delete();
    }

    public function getPaginate()
    {
        return Car::query()->paginate();
    }
}
