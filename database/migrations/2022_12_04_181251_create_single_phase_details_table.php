<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinglePhaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_phase_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('phase_id')->nullable();
            $table->integer('sub_phase_id')->nullable();
            $table->date('date')->nullable();
            $table->string('tok')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('created_by')->nullable();
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
        Schema::dropIfExists('single_phase_details');
    }
}
