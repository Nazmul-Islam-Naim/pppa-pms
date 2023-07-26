<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementDetails extends Model
{
    use HasFactory;
    protected $table = 'procurement_details';
    protected $fillable = ['project_id', 'g2g_basis', 'country', 
    'procurement_type', 'procurement_method', 'stages', 'envelope', 'negotiation', 'swiss_challenge', 'created_by'];

    //relation
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
