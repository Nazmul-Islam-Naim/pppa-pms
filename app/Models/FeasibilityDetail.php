<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeasibilityDetail extends Model
{
    use HasFactory;
    protected $table = "feasibility_details";
    protected $fillable = [
    	'date','project_id','feasibility_id','des','doc','image_title','image','tok','status','created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    
    // fisibility object
    public function feasibility()
    {
        return $this->hasOne('App\Models\FeasibilityCompany', 'id', 'feasibility_id');
    }
    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
