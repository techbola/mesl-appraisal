<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->decimal('team_work_self_ass',2,2);
            $table->decimal('responsibility_self_ass',2,2);
            $table->decimal('integrity_self_ass',2,2);
            $table->decimal('innovation_self_ass',2,2);
            $table->decimal('passion_self_ass',2,2);

            $table->decimal('team_work_supervisor_ass',2,2)->nullable();
            $table->decimal('responsibility_supervisor_ass',2,2)->nullable();
            $table->decimal('integrity_supervisor_ass',2,2)->nullable();
            $table->decimal('innovation_supervisor_ass',2,2)->nullable();
            $table->decimal('passion_supervisor_ass',2,2)->nullable();

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
        Schema::dropIfExists('appraisal_personals');
    }
}
