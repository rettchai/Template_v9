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
        Schema::create('helpdesks', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userID');
            $table->foreign('userID')->references('id')->on('users');

            $table->bigInteger('ItemID');
            $table->foreign('ItemID')->references('id')->on('items');

            $table->string("ItemName")->nullable();
            $table->string("OtherName")->nullable();
            $table->string("Place")->nullable();
            $table->string("Details")->nullable();
            $table->string("Notes")->nullable();

            $table->string("Phone")->nullable();
            $table->string("FullNameDoc")->nullable();
            $table->string("FacDoc")->nullable();

            $table->boolean("HelpDeskStatus")->default(true);
            $table->string("StatusText")->default("pending");
            $table->bigInteger("created_by")->nullable();
            $table->string("Position")->nullable();

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
        Schema::dropIfExists('helpdesks');
    }
};
