<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;


Route::get('car-create', [CarController::class, 'create'])
    ->name('car.create');
