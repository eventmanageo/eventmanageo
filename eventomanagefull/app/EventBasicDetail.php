<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBasicDetail extends Model
{
    protected $table = "event_basic_details";

    protected $fillable = ['event_name','event_type','event_date_to','event_date_from','event_manager_id', 'event_location', 'time_when_assigned_to_manager', 'no_people', 'event_status', 'user_id'];
}
