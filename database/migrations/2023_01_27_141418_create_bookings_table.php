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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ItemID');
            $table->foreign('ItemID')->references('id')->on('items');

            $table->dateTime('StartDateTime');
            $table->dateTime('EndDateTime');

            $table->bigInteger('userID');
            $table->foreign('userID')->references('id')->on('users');

            $table->string('BookingStatus');
            $table->text('Comments');

            $table->bigInteger('created_by');

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
};
