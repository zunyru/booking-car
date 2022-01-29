<?php

namespace App\Listeners;

use App\Events\CheckStock;
use App\Repositories\CarRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotiStock
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
     * @param \App\Events\CheckStock $event
     * @return void
     */
    public function handle(CheckStock $event)
    {
        $car_repo = new CarRepository();

        $car_repo->decrementStock($event->car, $event->amount);
    }
}
