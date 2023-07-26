<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPackageDetail extends Model
{
    use HasFactory;
    protected $table = "ticket_package_details";
    protected $fillable = [
    	'ticket_id','tok','status','created_by'
    ];

    // user object
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    // ticket object
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    }
}
