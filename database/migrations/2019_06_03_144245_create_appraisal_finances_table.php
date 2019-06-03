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
            $table->integer('user_id')->unsigned();
            $table->integer('supervisor_id')->unsigned();

            $table->string('financial_objective');
            $table->string('financial_kpi');
            $table->decimal('financial_target', 3,1);
            $table->decimal('financial_weight', 3,1);
            $table->decimal('financial_self_ass', 3,1);

            $table->decimal('financial_supervisor_ass',3,1)->nullable();
            $table->string('financial_justification')->nullable();

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
