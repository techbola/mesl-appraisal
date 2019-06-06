<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_finances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staffID')->unsigned();
            $table->integer('supervisorID')->unsigned();

            $table->string('objective');
            $table->string('kpi');
            $table->decimal('target', 3,1);
            $table->decimal('selfAssessment', 3,1);
            $table->string('constraint');

            $table->decimal('weight', 3,1)->nullable();
            $table->decimal('supervisorAssessment',3,1)->nullable();
            $table->string('justification')->nullable();

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
        Schema::dropIfExists('appraisal_finances');
    }
}
