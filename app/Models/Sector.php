<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = "sectors";
    protected $fillable = [
    	'name','slug','des','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    public function sectorProjects(){
        return $this->hasMany(Project::class,'sector_id');
    }
}
