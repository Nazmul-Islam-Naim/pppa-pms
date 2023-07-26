<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $fillable = [
        // summery

    	'name','slug','sector_id','location_id','area','key_feature','economic_life','contract_term','construction_time','image',
        'background', 'project_scope', 'objective', 'note',

        // structure/model/cost
    	'delivery_model','revenue_model','capital_cost','project_cost','leverage','vgf_amount_percent',

        //stakholder

        'grantor', 'ministry_id','implementing_agency_id','private_partner_id','shareholders','lenders','epc_contractors','o_m_contractors','independent_engineer',

        // key date

        'screening_date','in_princeple_approval','final_approval', 'contract_signing','contract_period','commencement_date','commencement_period',
        'completion_date','commercial_date',
        
        // contnious change

        'approval_id','implementation_period','cost_id','feasibility_id','construction_company_id','phase_id','sub_phase_id','document_type_id',
        
        'status','created_by'
    ];

    // sector object
    public function sector()
    {
        return $this->hasOne('App\Models\Sector', 'id', 'sector_id');
    }
    
    // ministry object
    public function ministry()
    {
        return $this->hasOne('App\Models\Ministry', 'id', 'ministry_id');
    }

    // implement agency object
    public function agency()
    {
        return $this->hasOne('App\Models\ImplementingAgency', 'id', 'implementing_agency_id');
    }

    // approval object
    public function approval()
    {
        return $this->hasOne('App\Models\Approval', 'id', 'approval_id');
    }

    // private partner object
    public function partner()
    {
        return $this->hasOne('App\Models\PrivatePartner', 'id', 'private_partner_id');
    }

    // location object
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }

    // cost object
    public function cost()
    {
        return $this->hasOne('App\Models\CapitalCost', 'id', 'cost_id');
    }

    // fisibility object
    public function feasibility()
    {
        return $this->hasOne('App\Models\FeasibilityCompany', 'id', 'feasibility_id');
    }

    // construction object
    public function construction()
    {
        return $this->hasOne('App\Models\ConstructionCompnay', 'id', 'construction_company_id');
    }

    // phase object
    public function phase()
    {
        return $this->hasOne('App\Models\Phase', 'id', 'phase_id');
    }

    // sub phase object
    public function subphase()
    {
        return $this->hasOne('App\Models\SubPhase', 'id', 'sub_phase_id');
    }

    //others document object
    public function document()
    {
        return $this->hasOne('App\Models\DocumentType', 'id', 'document_type_id');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
