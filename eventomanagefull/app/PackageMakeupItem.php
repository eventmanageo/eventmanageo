<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageMakeupItem extends Model
{
    protected $table = "package_makeup_items";
    protected $fillable = ['package_id','item_id'];
}
