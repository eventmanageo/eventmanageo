<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageCatererItem extends Model
{
    protected $table = "package_caterer_items";
    protected $fillable = ['package_id','item_id'];
}
