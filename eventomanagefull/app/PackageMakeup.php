<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageMakeup extends Model
{
    protected $table = "package_makeups";

    protected $fillable = ['vendor_id','package_name','package_description',
    'package_price','package_for'];
}
