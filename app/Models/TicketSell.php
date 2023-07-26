<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSell extends Model
{
    use HasFactory;
    protected $table = "ticket_sells";
    protected $fillable = [
    	'package_id','package_tok','amount','quantity','total','bank_id','date','tok','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    // ticket package object
    public function package()
    {
        return $this->hasOne('App\Models\TicketPackage', 'id', 'package_id');
    }

    // bank object
    public function bank()
    {
        return $this->hasOne('App\Models\BankAccount', 'id', 'bank_id');
    }
}
