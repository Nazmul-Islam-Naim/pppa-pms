<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetDetail extends Model
{
    use HasFactory;
    protected $table = "budget_details";
    protected $fillable = [
    	'project_id', 'firm_id','bank_id','amount','dollar_rate','currency_type','reason','date','tok','status', 'created_by'
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

    // feasibility firm object
    public function bank()
    {
        return $this->hasOne('App\Models\BankAccount', 'id', 'bank_id');
    }

    // feasibility firm object
    public function budget()
    {
        return $this->hasOne('App\Models\Budget', 'tok', 'tok');
    }

    // recovery firm object
    public function recoveryAmount()
    {
        return $this->hasOne('App\Models\BudgetRecovery', 'project_id', 'project_id');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
