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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ItemTypeID');
            $table->foreign('ItemTypeID')->references('id')->on('item_types');

            $table->string('ItemName')->nullable();
            $table->text('ItemDesc')->nullable();
            $table->boolean('Active')->default(true);
            $table->string('ItemStatus')->default('pending');

            $table->string('ItemNumbering')->nullable();
            $table->string('created_by')->nullable();

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
        Schema::dropIfExists('items');
    }
};
