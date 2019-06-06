<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staffID')->unsigned();
            $table->integer('supervisorID')->unsigned();
            $table->integer('appraisal_id')->unsigned();
            $table->decimal('time_management', 3, 1)->unsigned();
            $table->decimal('punctuality', 3, 1)->unsigned();
            $table->decimal('policy', 3, 1)->unsigned();
            $table->decimal('process_mgt', 3, 1)->unsigned();
            $table->decimal('ethics', 3, 1)->unsigned();
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
        Schema::dropIfExists('compliances');
    }
}
