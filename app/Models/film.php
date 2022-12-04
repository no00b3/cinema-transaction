<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class film extends Model
{
    use HasFactory  , softDeletes;

    
    protected $guarded = [];
    protected $dates = ['created_at'];

}
