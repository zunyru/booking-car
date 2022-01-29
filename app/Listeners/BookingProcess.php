<?php

namespace App\Listeners;

use App\Events\BookingCreate;
use App\Events\CheckStock;
use App\Repositories\BookingRepository;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class BookingProcess
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\BookingCreate $event
     * @return void
     */
    public function handle(BookingCreate $event)
    {
        $booking_repo = new BookingRepository();

        $car_repo = new CarRepository();
        $car = $car_repo->findById($event->data['car_id']);

        $param = self::makeParam($event->data, $car);

        //เพิ่มข้อมูลการจอง
        $booking_repo->store($param);

        //event ไปตัด stock
        event(new CheckStock($car, $event->data['amount']));
    }

    private function makeParam($data, $car)
    {
        return [
            'booking_date'  => $data['booking_date'],
            'customer_name' => $data['customer_name'],
            'car_id'        => $data['car_id'],
            'car_price'     => $car->price,
            'amount'        => $data['amount'],
            'total_price'   => (int)($car->price * $data['amount']),
            'status'        => 'จองแล้ว',
        ];
    }
}
