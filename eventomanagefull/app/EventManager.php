<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventManager extends Model
{

    protected $guard = 'eventmanager';

    protected $table = 'eventmanager';
    protected $fillable = ['name','email','password'];
    protected $hidden = ['password','remember_token'];
}
