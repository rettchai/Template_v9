<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->integer("FundID");
            $table->foreign("FundID")->references('id')->on('ref_funds');
            $table->string("ReceiptName")->nullable();
            $table->string("ReceiptTexID")->nullable();
            $table->string("ReceiptAddress")->nullable();
            $table->string("ReceiptSender")->nullable();
            $table->string("ContactName")->nullable();
            $table->string("ContactTel")->nullable();
            $table->string("DateTrafer")->nullable();
            $table->string("FileSlip")->nullable();
            $table->string("ReceiptStatus")->nullable();
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
        Schema::dropIfExists('donates');
    }
};
