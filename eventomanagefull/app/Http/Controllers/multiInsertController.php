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
        
        
        
        $type = $request->input('optradio');
        $loc = $request->input('location');
        
        $date = $request->input('date');
        $guest = $request->input('optradio1');
        $data=array('type'=>$type,"location"=>$loc,"date"=>$date,"guest"=>$guest);
        DB::table('multistep')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/cart">Click Here</a> to go back.';
        }
}