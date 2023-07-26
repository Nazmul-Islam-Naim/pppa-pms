<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('document_type_id')->nullable();
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
        Schema::dropIfExists('others_documents');
    }
}
