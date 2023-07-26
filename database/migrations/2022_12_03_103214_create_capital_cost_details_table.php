<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitalCostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capital_cost_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('cost_id')->nullable();
            $table->date('date')->nullable();
            $table->text('des')->nullable();
            $table->string('doc')->nullable();
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
        Schema::dropIfExists('capital_cost_details');
    }
}
