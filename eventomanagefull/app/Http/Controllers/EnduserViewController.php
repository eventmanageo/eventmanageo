<?php

namespace App\Http\Controllers;
use DB;
use Image;
use Illuminate\Http\Request;



class EnduserViewController extends Controller
{
    public function makeup()
    {
        $makeup_items = DB::select('select * from makeup_items');
        return view('main',['makeup_items'=>$makeup_items]);

    }
}
