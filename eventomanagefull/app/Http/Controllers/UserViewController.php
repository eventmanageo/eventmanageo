<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserViewController extends Controller
{
    public function index() {
        
        $users = DB::select('select * from users WHERE id');
        return view('user.user_profile',['users'=>$users]);
     }
}
