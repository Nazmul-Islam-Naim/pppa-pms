<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryModel extends Model
{
    use HasFactory;
    protected $table = 'delivery_models';
    protected $fillable = ['title', 'slug'];
}
