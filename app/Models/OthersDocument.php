<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OthersDocument extends Model
{
    use HasFactory;
    protected $table = "others_documents";
    protected $fillable = [
    	'project_id','document_type_id',
        'date','des','doc','tok',
        'status','created_by'
    ];

    // project object
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    // cost object
    public function document()
    {
        return $this->hasOne('App\Models\DocumentType', 'id', 'document_type_id');
    }

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
