<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // summery

            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->integer('sector_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('area')->nullable();
            $table->string('key_feature')->nullable();
            $table->string('economic_life')->nullable();
            $table->string('contract_term')->nullable();
            $table->string('construction_time')->nullable();
            $table->string('image')->nullable();
            $table->text('background')->nullable();
            $table->text('project_scope')->nullable();
            $table->text('objective')->nullable();
            $table->text('note')->nullable();

            // structure/model/cost

            $table->string('delivery_model')->nullable();
            $table->string('revenue_model')->nullable();
            $table->string('capital_cost')->nullable();
            $table->string('project_cost')->nullable();
            $table->string('leverage')->nullable();
            $table->string('vgf_amount_percent')->nullable();

            //stakholder
            
            $table->string('grantor')->nullable();
            $table->integer('ministry_id')->nullable();
            $table->integer('implementing_agency_id')->nullable();
            $table->integer('private_partner_id')->nullable();
            $table->string('shareholders')->nullable();
            $table->string('lenders')->nullable();
            $table->string('epc_contractors')->nullable();
            $table->string('o_m_contractors')->nullable();
            $table->string('independent_engineer')->nullable();

            // key date

            $table->date('screening_date')->nullable();
            $table->date('in_princeple_approval')->nullable();
            $table->date('final_approval')->nullable();
            $table->date('contract_signing')->nullable();
            $table->bigInteger('contract_period')->nullable();
            $table->date('commencement_date')->nullable();
            $table->bigInteger('commencement_period')->nullable();
            $table->date('completion_date')->nullable();
            $table->date('commercial_date')->nullable();

            // contnious change

            $table->integer('approval_id')->nullable();
            $table->text('implementation_period')->nullable();
            $table->integer('cost_id')->nullable();
            $table->integer('feasibility_id')->nullable();
            $table->integer('construction_company_id')->nullable();
            $table->integer('phase_id')->nullable();
            $table->integer('sub_phase_id')->nullable();
            $table->integer('document_type_id')->nullable();
            
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
        Schema::dropIfExists('projects');
    }
}
