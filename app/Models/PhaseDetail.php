<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhaseDetail extends Model
{
    use HasFactory;
    protected $table = "phase_details";
    protected $fillable = [
    	'project_id','phase_id','sub_phase_id',
        'date','des','doc','image_title','image','tok',
        'status','created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
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

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
