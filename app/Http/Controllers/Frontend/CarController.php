<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use App\Repositories\ModelCarRepository;
use App\Repositories\NewCarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{
    protected $model_car_repo;
    protected $car_repo;
    protected $new_car_repo;

    public function __construct(
        ModelCarRepository $modelCarRepository,
        CarRepository      $carRepository,
        NewCarRepository   $newCarRepository
    )
    {
        $this->model_car_repo = $modelCarRepository;
        $this->car_repo = $carRepository;
        $this->new_car_repo = $newCarRepository;

        $model_cars = $this->model_car_repo->getAll();

        View::share('model_cars', $model_cars);
    }

    public function index()
    {
        $cars = $this->car_repo->getLimit(9);

        return view('home', compact('cars'));
    }
}
