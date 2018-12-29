<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecoratorService extends Model
{
    protected $fillable = [
        'item_name','item_description','item_picture','item_price','vendor_id',
    ];
}
