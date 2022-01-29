<?php

namespace App\Jobs;

use App\Events\BookingCreate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BookingProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking_data)
    {
        $this->booking = $booking_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new BookingCreate($this->booking));
    }
}
