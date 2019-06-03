<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_compliances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->decimal('time_management_self_ass',2,2);
            $table->decimal('punctuality_self_ass',2,2);
            $table->decimal('policy_self_ass',2,2);
            $table->decimal('process_mgt_self_ass',2,2);
            $table->decimal('ethics_self_ass',2,2);

            $table->decimal('time_management_supervisor_ass',2,2)->nullable();
            $table->decimal('punctuality_supervisor_ass',2,2)->nullable();
            $table->decimal('policy_supervisor_ass',2,2)->nullable();
            $table->decimal('process_mgt_supervisor_ass',2,2)->nullable();
            $table->decimal('ethics_supervisor_ass',2,2)->nullable();

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
        Schema::dropIfExists('appraisal_compliances');
    }
}
