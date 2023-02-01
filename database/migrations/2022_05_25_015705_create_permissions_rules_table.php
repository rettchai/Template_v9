<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('permissions_id');
            $table->foreign('permissions_id')->references('id')->on('permissions');
            $table->string('pages')->nullable();
            $table->string('remark')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('permissions_rules');
    }
};
