<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventManagerController extends Controller
{
    public function showAllocatedEventPage(){
        return view('eventmanager.allocatedevent');
    }
}
