<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppraisalCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisal_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->decimal('stakeholders_objective');
            $table->string('stakeholders_kpi');
            $table->decimal('stakeholders_target', 3, 1);
            $table->decimal('stakeholders_weight', 3,1);
            $table->decimal('stakeholders_self_ass', 3,1);

            $table->decimal('stakeholders_supervisor_ass',3,1)->nullable();
            $table->string('stakeholders_justification')->nullable();

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
        Schema::dropIfExists('appraisal_customers');
    }
}
