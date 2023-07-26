<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionDetail extends Model
{
    use HasFactory;
    protected $table = "construction_details";
    protected $fillable = [
    	'project_id','construction_company_id',
        'date','des','doc','tok',
        'status','created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    // cost object
    public function construction()
    {
        return $this->hasOne('App\Models\ConstructionCompnay', 'id', 'construction_company_id');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
