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
        return view('end_user.S_makup');
    }
    public function photo(){
        return view('end_user.photo');
    }
    public function location(){
        return view('end_user.S_location');
    }
    public function videography(){
        return view('end_user.S_video');
    }
    public function transport(){
        return view('end_user.S_transport');
    }

    
}
