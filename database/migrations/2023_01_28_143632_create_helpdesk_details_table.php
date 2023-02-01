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
        Schema::create('helpdesk_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('HelpDeskID');
            $table->foreign('HelpDeskID')->references('id')->on('helpdesks');

            $table->text('Comments')->nullable();

            $table->boolean("DetailStatus")->default(true);
            $table->string("DetailStatusText")->default("pending");
            $table->string("created_type")->default("user");
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
        Schema::dropIfExists('helpdesk_details');
    }
};
