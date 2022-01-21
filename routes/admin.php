<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

//รูปแบบที่ 1
Route::get('car/create', [CarController::class, 'create'])
    ->name('car.create');

Route::post('car/store', [CarController::class, 'store'])
    ->name('car.store');

Route::get('car/{car}/edit', [CarController::class, 'edit'])
    ->name('car.edit');

Route::match(['put', 'patch'], 'car/{car}', [CarController::class, 'update'])
    ->name('car.update');

//รูปแบบที่ 2
//Route::resource('car',CarController::class);

//รูปแบบ 3 จะต้องเป็น laravel 8.80 ขึ้นไปเท่านั้น
/*Route::prefix('car')
    ->name('car.')
    ->controller(CarController::class)
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::get('edit/{id}', 'edit')->name('edit');
    });*/


