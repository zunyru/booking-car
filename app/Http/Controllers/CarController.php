<?php

namespace App\Http\Controllers;

use App\Jobs\BookingProcess;
use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Repositories\CarRepository;
use App\Repositories\ModelCarRepository;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{

    protected $model_car_repo;
    protected $car_repo;

    public function __construct(
        ModelCarRepository $modelCarRepository,
        CarRepository      $carRepository
    )
    {
        $this->model_car_repo = $modelCarRepository;
        $this->car_repo = $carRepository;

        $model_cars = $this->model_car_repo->getAll();

        View::share('model_cars', $model_cars);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        BookingProcess::dispatch();

        $cars = $this->car_repo->getPaginate();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCarRequest $request)
    {
        $data = $this->car_repo->store($request);

        return redirect()
            ->route('car.index')
            ->with([
                'messege' => 'sucess'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.create-edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCarRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $this->car_repo->valiable($car, $request);

        return redirect()
            ->route('car.index')
            ->with([
                'messege' => 'sucess'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Car $car)
    {
        $this->car_repo->delete($car);

        return redirect()
            ->route('car.index')
            ->with([
                'messege' => 'sucess'
            ]);
    }
}
