<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportService extends Model
{
    protected $fillable = [
        'vehicle_name','vehicle_description','vehicle_picture',
        'vehicle_price','vehicle_type','vendor_id',
    ];
}
