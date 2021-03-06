<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VendorResetPasswordNotification;
use CompanyDetails;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $fillable = [
        'name', 'email', 'password','contact','category','address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new VendorResetPasswordNotification($token));
    }

    public function companydetails(){
        return $this->hasOne(CompanyDetails::class);
    }
    
}
