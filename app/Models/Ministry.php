<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;
    protected $table = "ministries";
    protected $fillable = [
    	'name','slug','des','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    
    public function agencies(){
        return $this->hasMany(ImplementingAgency::class,'ministry_id');
    }
    
    public function ministryProjects(){
        return $this->hasMany(Project::class,'ministry_id');
    }
}
