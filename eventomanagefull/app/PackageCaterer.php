<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageCaterer extends Model
{
    protected $table = "package_caterers";

    protected $fillable = ['vendor_id','package_name','package_description',
    'package_price','package_dine_time'];
}
