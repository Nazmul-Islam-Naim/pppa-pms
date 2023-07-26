<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateG2GDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g2_g_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('country_id');
            $table->string('document');
            $table->date('date');
            $table->date('des')->nullable();
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
        Schema::dropIfExists('g2_g_documents');
    }
}
