<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBasicDetail extends Model
{
    protected $table = "multistep";

    protected $fillable = ['type','type2','location','check_in','check_out'];
}
