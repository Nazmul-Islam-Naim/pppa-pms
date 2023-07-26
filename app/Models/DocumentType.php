<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    protected $table = "document_types";
    protected $fillable = [
    	'name','des','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    
    
    public function documents(){
        return $this->hasMany(OthersDocument::class,'document_type_id','id');
    }
}
