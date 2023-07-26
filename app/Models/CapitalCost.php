<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalCost extends Model
{
    use HasFactory;
    protected $table = "capital_costs";
    protected $fillable = [
    	'name','des','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
}
