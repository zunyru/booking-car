<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\BookingProcess;
use App\Repositories\CarRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $car_repo;

    public function __construct(
        CarRepository $carRepository
    )
    {
        $this->car_repo = $carRepository;
    }

    public function bookingFrom(Request $request, $car_id)
    {
        $car = $this->car_repo->findById($car_id);

        return view('bookings.form', compact('car'));
    }

    public function booking(Request $request)
    {
        //เรียกใช้ job
        BookingProcess::dispatch($request->all());

        return "OK";
    }
}
