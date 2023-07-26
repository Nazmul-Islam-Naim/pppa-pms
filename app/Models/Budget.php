<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $table = "budgets";
    protected $fillable = [
    	'project_id', 'firm_id','contract_amount','currency_type','payment','recovery','date','tok','note','status', 'created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    // feasibility firm object
    public function firm()
    {
        return $this->hasOne('App\Models\FeasibilityCompany', 'id', 'firm_id');
    }

    // dollar rate object
    public function dollarRate()
    {
        return $this->hasOne('App\Models\BudgetDetail', 'tok', 'tok');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
