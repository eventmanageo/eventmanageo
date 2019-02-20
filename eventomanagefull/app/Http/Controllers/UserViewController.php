<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index() {
        $users = DB::select('select * from users');
        return view('user.user_profile',['users'=>$users]);
     }
}
