<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DineTime extends Model
{
    protected $table = "dine_times";
    
    protected $fillable = ['dine_name'];
}
