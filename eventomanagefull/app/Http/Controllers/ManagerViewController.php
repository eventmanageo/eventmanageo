<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ManagerViewController extends Controller
{
    public function cart(){
        return view('eventmanager.cart');
    }

    public function vendor(){
        $users = DB::select('select * from vendors');
        return view('eventmanager.vendor',['users'=>$users]);
        }

}
