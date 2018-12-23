<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventManager extends Model
{
    protected $table = 'eventmanager';

    protected $fillable = ['eventmanagername','eventmanageremail','eventmanagerpassword'];

    protected $hidden = ['eventmanagerpassword','remember_token'];
}
