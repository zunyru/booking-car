<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('booking_date');
            $table->string('customer_name');
            $table->foreignId('car_id')->constrained();
            $table->decimal('car_price');
            $table->integer('amount');
            $table->integer('total_price');
            $table->enum('status', ['กำลังจอง', 'จองแล้ว', 'คืนแล้ว'])->default('กำลังจอง');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
