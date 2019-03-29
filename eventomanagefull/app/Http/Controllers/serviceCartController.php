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
    // create pakages and display
    //   caterer pakages
    public function pakages_caterer(){

        $select = DB::select('SELECT * FROM package_caterers ORDER BY id ASC ');
        $select1 = DB::select("SELECT * FROM caterer_items,package_caterers WHERE EXISTS (SELECT package_id,item_id FROM package_caterer_items WHERE package_id=package_caterers.id AND item_id=caterer_items.id)");
        return view('end_user.pakages.P_catering')->with('p_caterer',$select)->with('p_services',$select1);
    }
   
     
}
