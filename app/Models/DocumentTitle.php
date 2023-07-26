<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTitle extends Model
{
    use HasFactory;
    protected $table = "document_titles";
    protected $fillable = [
    	'name','phase_id','sub_phase_id','des','status','created_by'
    ];

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
