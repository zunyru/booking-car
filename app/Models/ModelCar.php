<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelCar extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo'];

    public function getNameAttribute($value)
    {
        return Str::title($value);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
