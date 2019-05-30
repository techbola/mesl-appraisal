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
            $table->string('employee_name');
            $table->string('job_position');
            $table->string('department');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
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
