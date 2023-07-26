<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPhase extends Model
{
    use HasFactory;
    protected $table = "sub_phases";
    protected $fillable = [
    	'name','phase_id','des','status','created_by'
    ];

    // phase object
    public function phase()
    {
        return $this->hasOne('App\Models\Phase', 'id', 'phase_id');
    }
    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
