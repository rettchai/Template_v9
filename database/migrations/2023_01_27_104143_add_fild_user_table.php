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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->bigInteger('FacID')->nullable();
            // $table->foreign('FacID')->references('id')->on('ref_facs');
            $table->string('Position')->nullable();
            $table->string('FullNameDoc')->nullable();
            $table->text('distinguishedname')->nullable();
            $table->string('fullnameAD')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
