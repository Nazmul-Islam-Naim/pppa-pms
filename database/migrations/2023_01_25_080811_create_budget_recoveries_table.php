<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetRecoveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_recoveries', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('firm_id')->nullable();
            $table->integer('implementing_agency_id')->nullable();
            $table->decimal('amount',15,2)->default(0);
            $table->decimal('extra_percent')->default(0);
            $table->decimal('total_amount',15,2)->default(0);
            $table->decimal('recover_amount',15,2)->default(0);
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
        Schema::dropIfExists('budget_recoveries');
    }
}
