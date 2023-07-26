<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_sells', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable();
            $table->string('package_tok')->nullable();
            $table->decimal('amount')->default(0);
            $table->integer('quantity')->default(1);
            $table->decimal('total')->default(0);
            $table->integer('bank_id')->default(1);
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
        Schema::dropIfExists('ticket_sells');
    }
}
