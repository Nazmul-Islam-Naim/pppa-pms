<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReveneueModel extends Model
{
    use HasFactory;
    protected $table = 'reveneue_models';
    protected $fillable = ['title', 'slug'];
}
