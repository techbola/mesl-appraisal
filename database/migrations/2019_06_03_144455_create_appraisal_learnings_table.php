<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_learnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->string('learning_objective');
            $table->string('learning_kpi');
            $table->decimal('learning_target',3,1);
            $table->decimal('learning_weight',3,1);
            $table->decimal('learning_self_ass',3,1);

            $table->decimal('learning_supervisor_ass',3,1)->nullable();
            $table->string('learning_justification')->nullable();

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
        Schema::dropIfExists('appraisal_learnings');
    }
}
