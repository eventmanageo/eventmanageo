<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class userProfileController extends Controller
{
    public function index()
    {   
        $id = Auth::id();
        $select = DB::select('SELECT * FROM users WHERE id = ?',[$id]);
        return view('end_user.profile')->with('profile',$select);
    }
}
