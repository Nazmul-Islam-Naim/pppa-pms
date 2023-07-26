<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('firm_id')->nullable();
            $table->decimal('contract_amount',15,2)->default(0);
            $table->string('currency_type')->nullable();
            $table->decimal('payment',15,2)->default(0);
            $table->decimal('recovery',15,2)->default(0);
            $table->date('date')->nullable();
            $table->string('tok')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('budgets');
    }
}
