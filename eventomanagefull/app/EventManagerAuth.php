<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EventManagerAuth extends Authenticatable
{
    protected $guard = 'eventmanager';
    protected $table = 'eventmanager';

    protected $fillable = ['name','email','password'];
    protected $hidden = ['password','remember_token'];
}
