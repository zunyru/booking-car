<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $appends = [
        'price_bath'
    ];

    public function modelCar()
    {
        return $this->belongsTo(ModelCar::class);

        /*return $this->belongsTo(
            ModelCar::class,
            'model_car_id',
            'id'
        );*/
    }

    protected function price(): Attribute
    {
        return new Attribute(
            get: fn($value) => number_format($value, 0),
            set: fn($value) => (float)$value
        );
    }

    protected function stock(): Attribute
    {
        return new Attribute(
            get: fn($value) => number_format($value, 0)
        );
    }

    public function getPriceBathAttribute()
    {
        return "{$this->price} ฿";
    }
}
