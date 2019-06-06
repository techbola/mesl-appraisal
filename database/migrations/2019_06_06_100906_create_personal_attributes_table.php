<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staffID')->unsigned();
            $table->integer('supervisorID')->unsigned();
            $table->integer('appraisal_id')->unsigned();
            $table->decimal('team_work', 3, 1)->unsigned();
            $table->decimal('responsibility', 3, 1)->unsigned();
            $table->decimal('integrity', 3, 1)->unsigned();
            $table->decimal('innovation', 3, 1)->unsigned();
            $table->decimal('passion', 3, 1)->unsigned();
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
        Schema::dropIfExists('personal_attributes');
    }
}
