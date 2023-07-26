<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class G2GDocument extends Model
{
    use HasFactory;
    protected $table = 'g2_g_documents';
    protected $fillable = ['project_id','country_id', 'document', 'date', 'des'];

    //relationship

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
