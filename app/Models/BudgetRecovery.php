<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetRecovery extends Model
{
    use HasFactory;
    protected $table = 'budget_recoveries';
    protected $fillable = [
        'project_id',
        'firm_id',
        'implementing_agency_id',
        'amount',
        'extra_percent',
        'total_amount',
        'recover_amount',
        'date',
        'tok',
        'status',
        'created_by',
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

    // implementing agency object
    public function agency()
    {
        return $this->hasOne('App\Models\ImplementingAgency', 'id', 'implementing_agency_id');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
