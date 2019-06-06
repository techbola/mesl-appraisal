<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_competencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staffID')->unsigned();
            $table->integer('supervisorID')->unsigned();
            $table->integer('appraisal_id')->unsigned();
            $table->decimal('self_starter', 3, 1)->unsigned();
            $table->decimal('problem_solving', 3, 1)->unsigned();
            $table->decimal('analytical_skill', 3, 1)->unsigned();
            $table->decimal('technical_skill', 3, 1)->unsigned();
            $table->decimal('leadership', 3, 1)->unsigned();
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
        Schema::dropIfExists('job_competencies');
    }
}
