<?php

namespace App\Http\Controllers;
use DB;
use Image;

use Illuminate\Http\Request;

class serviceCartController extends Controller
{
    public function ViewService(){
        $select = DB::select('SELECT * FROM added_carts ORDER BY id ASC');
        return view('end_user.Services_view')->with('view_service',$select);

        
       
    }
    
    public function delete_caterer($id)
    {
        DB::delete('delete from added_carts where id = ?',[$id]);
        return redirect()->back();

    }
}
