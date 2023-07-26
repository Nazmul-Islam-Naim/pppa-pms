<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalCostDetail extends Model
{
    use HasFactory;
    protected $table = "capital_cost_details";
    protected $fillable = [
    	'project_id','cost_id',
        'date','des','doc','tok',
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

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
