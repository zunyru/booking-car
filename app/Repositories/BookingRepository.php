<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function store($params)
    {
        $data = new Booking();

        return $this->valiable($data, $params);
    }

    public function valiable(Booking $data, $params)
    {
        $params = (object)$params;

        !isset($params->booking_date) ?: $data->booking_date = $params->booking_date;
        !isset($params->customer_name) ?: $data->customer_name = $params->customer_name;
        !isset($params->car_id) ?: $data->car_id = $params->car_id;
        !isset($params->car_price) ?: $data->car_price = $params->car_price;
        !isset($params->amount) ?: $data->amount = $params->amount;
        !isset($params->total_price) ?: $data->total_price = $params->total_price;
        !isset($params->status) ?: $data->status = $params->status;

        return $data->save();
    }
}
