<?php

namespace App\Http\Controllers;
use DB;
use Image;

use Illuminate\Http\Request;
use Auth;



class EnduserViewController extends Controller
{
    
    public function catering(){
        $select = DB::select('SELECT * FROM caterer_items ORDER BY id ASC');
        return view('end_user.S_catering')->with('catering',$select);
    }
    public function makup(){
        $select = DB::select('SELECT * FROM makeup_items ORDER BY id ASC');
        return view('end_user.S_makup')->with('makeup',$select);
    }
    public function photo(){
        $select = DB::select('SELECT * FROM photographer_services ORDER BY id ASC');
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


    public function catering_store(request $request)
    {
        $service_name = $request->input('caterer');
        $service_id = $request->input('caterer_id');
        $name = $request->input('service_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;

        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );

        return redirect()->back();
    }
    public function makup_store(request $request)
    {
        $service_name = $request->input('makup');
        $service_id = $request->input('makup_id');
        $name = $request->input('makup_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;
        
        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );
        return redirect()->back();
    }

    public function transport_store(request $request)
    {
        $service_name = $request->input('transport');
        $service_id = $request->input('transport_id');
        $name = $request->input('transport_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;
        
        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );
        return redirect()->back();
    }

    public function sound_DJ(request $request)
    {
        $service_name = $request->input('sound');
        $service_id = $request->input('sound_id');
        $name = $request->input('sound_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;
        
        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );
        return redirect()->back();
    }
    public function photographer(request $request)
    {
        $service_name = $request->input('photographer');
        $service_id = $request->input('photographer_id');
        $name = $request->input('photographer_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;
        
        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );
        return redirect()->back();
    }

    public function decoration(request $request)
    {
        $service_name = $request->input('decorator');
        $service_id = $request->input('decorator_id');
        $name = $request->input('decorator_name');
        $desc = $request->input('description');
        $price = $request->input('price');
        $username= Auth::user()->name;
        $userid = Auth::user()->id;
        
        DB::table('added_carts')->insert(
        ['user_id' => $userid, 'username' => $username, 'name' => $service_name, 'service_id' => $service_id, 'service_name' => $name, 'Description' => $desc,'price'=>$price]
        );
        return redirect()->back();
    }


    
    
}


    
    

    


