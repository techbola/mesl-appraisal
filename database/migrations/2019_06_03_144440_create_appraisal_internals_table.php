<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_internals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->string('internal_process_objective');
            $table->string('internal_process_kpi');
            $table->decimal('internal_process_target', 3,1);
            $table->decimal('internal_process_weight', 3,1);
            $table->decimal('internal_process_self_ass', 3,1);

            $table->decimal('internal_process_supervisor_ass',3,1)->nullable();
            $table->string('internal_process_justification')->nullable();

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
        Schema::dropIfExists('appraisal_internals');
    }
}
