<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandService extends Model
{
    protected $fillable = [
        'land_name','land_description',
        'land_picture','land_price','land_address','vendor_id',
    ];
}
