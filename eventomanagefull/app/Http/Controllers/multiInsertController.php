<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class multiInsertController extends Controller
{
    public function insertform()
    {
        return view('multi');
    }
    public function insert(Request $request)
    {
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