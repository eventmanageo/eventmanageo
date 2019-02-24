<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class multiInsertController extends Controller
{
    public function insertform()
    {
        return view('end_user.multi');
    }
    public function insert(Request $request)
    {
        
       /* $post = new multistep;
        $post->type = Input::get('optradio');
        $post->location = Input::get('location');
        $post->date = Input::get('date');
        $post->guest = Input::get('optradio1');
        $post->save();*/
        
        $type = $request->input('Groom');
        $type2 = $request->input('Bride');
      
        $loc = $request->input('location');
        
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $guest = $request->input('numberofg');
        
        $data=array('type'=>$type,"type2"=>$type2,"location"=>$loc, "check_in"=>$check_in, "check_out"=>$check_out, "guest"=>$guest);
        DB::table('multistep')->insert($data);
        
        return redirect()->action('EnduserViewController@catering');


        
        }
        // function pass_value()
        // {
            // return view("main");
        // }
        
}

