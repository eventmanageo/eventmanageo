<?php

namespace App\Http\Controllers;
use DB;
use Image;
use App\CatererItem;



use Illuminate\Http\Request;
use Auth;

class serviceCartController extends Controller
{
     public function ViewService(){
        // Request $request, $id
        //$value = $request->session()->get('key');

        $username = Auth::user()->name;
        $userid = Auth::user()->id;
      
         $select = DB::select("SELECT * FROM added_carts where user_id='$userid' and username='$username' ");
        return view('end_user.Services_view')->with('view_service',$select);
       
  
        
       
    }
    public function delete_caterer($id)
    {
        // $userid = Auth::user()->id;
        DB::delete('delete from added_carts where id = ?',[$id]);
        return redirect()->back();

    }
   
     
}
