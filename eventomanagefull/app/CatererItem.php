<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatererItem extends Model
{
    protected $fillable = [
        'item_name','item_description','item_dine_time','item_category',
        'item_price','item_picture','vendor_id',
    ];
}
