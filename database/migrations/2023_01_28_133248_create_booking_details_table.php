<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('BookingID');
            $table->foreign('BookingID')->references('id')->on('bookings');

            $table->text('Comments')->nullable();

            $table->boolean("DetailStatus")->default(true);
            $table->string("DetailStatusText")->default("pending");
            $table->bigInteger("created_by")->nullable();

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
        Schema::dropIfExists('booking_details');
    }
};
