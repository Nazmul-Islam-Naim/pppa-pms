<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('reason')->nullable();
            $table->integer('phase_id')->nullable();
            $table->integer('sub_phase_id')->nullable();
            $table->integer('cost_id')->nullable();
            $table->integer('feasibility_id')->nullable();
            $table->integer('construction_company_id')->nullable();
            $table->integer('document_type_id')->nullable();
            $table->string('doc')->nullable();
            $table->text('note')->nullable();
            $table->text('image_title')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('project_details');
    }
}
