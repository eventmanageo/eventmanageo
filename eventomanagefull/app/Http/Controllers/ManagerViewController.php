<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerViewController extends Controller
{
    public function cart(){
        return view('eventmanager.cart');
    }
}
