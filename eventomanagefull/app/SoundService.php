<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoundService extends Model
{
    protected $fillable = [
        'service_name','service_description','service_picture',
        'service_price','service_type','vendor_id',
    ];
}
