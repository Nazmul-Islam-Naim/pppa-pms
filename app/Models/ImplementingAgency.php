<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementingAgency extends Model
{
    use HasFactory;
    protected $table = "implementing_agencies";
    protected $fillable = [
    	'name','slug','ministry_id','des','status','created_by'
    ];

    // ministry object
    public function ministry()
    {
        return $this->hasOne('App\Models\Ministry', 'id', 'ministry_id');
    }
    
    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    
    public function agencyProjects(){
        return $this->hasMany(Project::class,'implementing_agency_id');
    }
}
