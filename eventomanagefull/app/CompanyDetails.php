<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vendor;

class CompanyDetails extends Model
{
    protected $fillable = [
        'vendor_id','company_name', 'company_description', 'company_email','company_contact_no',
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
