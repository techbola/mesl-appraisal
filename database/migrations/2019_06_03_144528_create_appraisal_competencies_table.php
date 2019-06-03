<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_competencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->decimal('self_starter_self_ass',2,2);
            $table->decimal('problem_solving_self_ass',2,2);
            $table->decimal('analytical_skill_self_ass',2,2);
            $table->decimal('technical_skill_self_ass',2,2);
            $table->decimal('leadership_self_ass',2,2);

            $table->decimal('self_starter_supervisor_ass',2,2)->nullable();
            $table->decimal('problem_solving_supervisor_ass',2,2)->nullable();
            $table->decimal('analytical_skill_supervisor_ass',2,2)->nullable();
            $table->decimal('technical_skill_supervisor_ass',2,2)->nullable();
            $table->decimal('leadership_supervisor_ass',2,2)->nullable();

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
        Schema::dropIfExists('appraisal_competencies');
    }
}
