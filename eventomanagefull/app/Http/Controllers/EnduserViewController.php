<?php

namespace App\Http\Controllers;
use DB;
use Image;
use Illuminate\Http\Request;



class EnduserViewController extends Controller
{
    public function invites(){
       
        return view('end_user.main');
    }
    public function catering(){
        return view('end_user.S_catering');
    }
    public function makup(){
        $select = DB::select('SELECT * FROM makeup_items ORDER BY id ASC');
        return view('end_user.S_makup')->with('makeup',$select);
    }
    public function photo(){
        $select = DB::select('SELECT * FROM package_photographers ORDER BY id ASC');
        return view('end_user.S_photo')->with('photgraph',$select);
    }
    public function decorator(){
        $select = DB::select('SELECT * FROM decorator_services ORDER BY id ASC');
        return view('end_user.S_decorator')->with('decorator',$select);
    }
    public function sound(){
        $select = DB::select('SELECT * FROM sound_services ORDER BY id ASC');
        return view('end_user.S_Sound')->with('sound',$select);
    }
    public function transport(){
        $select = DB::select('SELECT * FROM transport_services ORDER BY id ASC');
        return view('end_user.S_transport')->with('transport',$select);
    }

    
}
