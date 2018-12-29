<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagePhotographer extends Model
{
    protected $fillable = ['vendor_id','package_name','package_description',
    'package_price'];
}
