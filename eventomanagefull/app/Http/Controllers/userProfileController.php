<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class userProfileController extends Controller
{
    public function index()
    {
        $select = DB::select('SELECT * FROM users ORDER BY id ASC');
        return view('end_user.profile')->with('profile',$select);
    }
}
