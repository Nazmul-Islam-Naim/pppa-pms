<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;
    protected $table = "project_details";
    protected $fillable = [
    	'date','project_id',
    	'reason','phase_id',
        'sub_phase_id','note',
    	'cost_id','feasibility_id','construction_company_id','document_type_id','doc','tok',
    	'image_title','image',
        'status','created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    // cost object
    public function cost()
    {
        return $this->hasOne('App\Models\CapitalCost', 'id', 'cost_id');
    }

    // phase object
    public function phase()
    {
        return $this->hasOne('App\Models\Phase', 'id', 'phase_id');
    }

    // sub phase object
    public function subPhase()
    {
        return $this->hasOne('App\Models\SubPhase', 'id', 'sub_phase_id');
    }

    // feasibility object
    public function feasibility()
    {
        return $this->hasOne('App\Models\FeasibilityCompany', 'id', 'feasibility_id');
    }

    // construction agency object
    public function construction()
    {
        return $this->hasOne('App\Models\ConstructionCompnay', 'id', 'construction_company_id');
    }

    // others document object
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
