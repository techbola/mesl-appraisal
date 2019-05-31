<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->string('employee_name');
            $table->string('job_position');
            $table->string('department');

            $table->string('financial_objective');
            $table->string('financial_kpi');
            $table->decimal('financial_target', 3,1);
            $table->decimal('financial_weight', 3,1);
            $table->decimal('financial_self_ass', 3,1);

            $table->decimal('stakeholders_objective');
            $table->string('stakeholders_kpi');
            $table->decimal('stakeholders_target', 3, 1);
            $table->decimal('stakeholders_weight', 3,1);
            $table->decimal('stakeholders_self_ass', 3,1);

            $table->string('internal_process_objective');
            $table->string('internal_process_kpi');
            $table->decimal('internal_process_target', 3,1);
            $table->decimal('internal_process_weight', 3,1);
            $table->decimal('internal_process_self_ass', 3,1);

            $table->string('learning_objective');
            $table->string('learning_kpi');
            $table->decimal('learning_target',3,1);
            $table->decimal('learning_weight',3,1);
            $table->decimal('learning_self_ass',3,1);

            $table->string('appraisee_comment');

            $table->decimal('team_work_self_ass',2,2);
            $table->decimal('responsibility_self_ass',2,2);
            $table->decimal('integrity_self_ass',2,2);
            $table->decimal('innovation_self_ass',2,2);
            $table->decimal('passion_self_ass',2,2);
            $table->decimal('self_starter_self_ass',2,2);
            $table->decimal('problem_solving_self_ass',2,2);
            $table->decimal('analytical_skill_self_ass',2,2);
            $table->decimal('technical_skill_self_ass',2,2);
            $table->decimal('leadership_self_ass',2,2);
            $table->decimal('time_management_self_ass',2,2);
            $table->decimal('punctuality_self_ass',2,2);
            $table->decimal('policy_self_ass',2,2);
            $table->decimal('process_mgt_self_ass',2,2);
            $table->decimal('ethics_self_ass',2,2);

            $table->string('appraisee_sign');

            $table->string('appraiser_designation')->nullable();
            $table->string('appraiser_name')->nullable();
            $table->string('appraiser_period')->nullable();

            $table->decimal('financial_supervisor_ass',3,1)->nullable();
            $table->string('financial_justification')->nullable();

            $table->decimal('stakeholders_supervisor_ass',3,1)->nullable();
            $table->string('stakeholders_justification')->nullable();

            $table->decimal('internal_process_supervisor_ass',3,1)->nullable();
            $table->string('internal_process_justification')->nullable();

            $table->decimal('learning_supervisor_ass',3,1)->nullable();
            $table->string('learning_justification')->nullable();

            $table->string('appraiser_comment')->nullable();
            $table->string('recommendation_promote')->nullable();
            $table->string('recommendation_commendation')->nullable();
            $table->string('recommendation_performance')->nullable();
            $table->string('recommendation_exit')->nullable();
            $table->string('training_need')->nullable();

            $table->decimal('team_work_supervisor_ass',2,2)->nullable();
            $table->decimal('responsibility_supervisor_ass',2,2)->nullable();
            $table->decimal('integrity_supervisor_ass',2,2)->nullable();
            $table->decimal('innovation_supervisor_ass',2,2)->nullable();
            $table->decimal('passion_supervisor_ass',2,2)->nullable();
            $table->decimal('self_starter_supervisor_ass',2,2)->nullable();
            $table->decimal('problem_solving_supervisor_ass',2,2)->nullable();
            $table->decimal('analytical_skill_supervisor_ass',2,2)->nullable();
            $table->decimal('technical_skill_supervisor_ass',2,2)->nullable();
            $table->decimal('leadership_supervisor_ass',2,2)->nullable();
            $table->decimal('time_management_supervisor_ass',2,2)->nullable();
            $table->decimal('punctuality_supervisor_ass',2,2)->nullable();
            $table->decimal('policy_supervisor_ass',2,2)->nullable();
            $table->decimal('process_mgt_supervisor_ass',2,2)->nullable();
            $table->decimal('ethics_supervisor_ass',2,2)->nullable();

            $table->string('appraiser_sign');
            $table->string('executive_sign');
            $table->string('hr_sign');

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
        Schema::dropIfExists('appraisal');
    }
}
