<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcurementDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->string('g2g_basis',50)->nullable();
            $table->string('country',50)->nullable();
            $table->string('procurement_type',50)->nullable();
            $table->string('procurement_method',50)->nullable();
            $table->string('stages',50)->nullable();
            $table->string('envelope',50)->nullable();
            $table->string('negotiation',50)->nullable();
            $table->string('swiss_challenge',50)->nullable();
            $table->tinyInteger('created_by')->default(1);
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
        Schema::dropIfExists('procurement_details');
    }
}
