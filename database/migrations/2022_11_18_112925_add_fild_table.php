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
        Schema::table('donates', function (Blueprint $table) {
            //
            $table->boolean("CapitalScholarship")->default(false);
            $table->decimal('CapitalScholarship_Amount', $precision = 18, $scale = 2)->nullable();
            $table->string("CapitalScholarship_StudyCondition")->nullable();
            $table->string("CapitalScholarship_PoorName")->nullable();
            $table->string("CapitalScholarship_FundName")->nullable();
            $table->string("CapitalScholarship_FundCondition")->nullable();
            $table->string("CapitalScholarship_Other")->nullable();

            $table->boolean("CapitalResearch")->default(false);
            $table->decimal('CapitalResearch_Amount', $precision = 18, $scale = 2)->nullable();

            $table->boolean("CapitalActivity")->default(false);
            $table->decimal('CapitalActivity_Amount', $precision = 18, $scale = 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donates', function (Blueprint $table) {
            //
        });
    }
};
