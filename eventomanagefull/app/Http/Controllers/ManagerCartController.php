<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ManagerCartController extends Controller
{
    public function cart(){

        $users = DB::select('select * from added_carts WHERE id');
        return view('eventmanager.cart',['users'=>$users]);
        

        $users = DB::select('select * from added_carts');
        return view('eventmanager.cart_edit',['users'=>$users]);
        }

        #Display cart details  

        public function display($id) {
        $users = DB::select('select * from added_carts where id = ?',[$id]);
        return view('eventmanager.cart_edit',['users'=>$users]);
        }

        #edit cart details

        public function edits(Request $request,$id) {
        $name = $request->input('name');
        $service_name = $request->input('service_name');
        $description = $request->input('description');
        $price = $request->input('price');
        //$data=array('name'=>$name,"service_name=>$service_name,"description"=>$description,"price"=>$price);
        //DB::table('added_carts')->update($data);
        // DB::table('added_carts')->whereIn('id', $id)->update($request->all());
        DB::update('update added_carts set name = ?,service_name=?,description=?,price=? where id = ?',[$name,$service_name,$description,$price,$id]);
        echo "Record updated successfully.
        ";
        echo '<a href="/edit-record">Click Here</a>';
    }

    //for delete Cart Details
    public function destroys($id) {
        DB::delete('delete from added_carts where id = ?',[$id]);
        echo "Record deleted successfully.
        ";
        echo '<a href="/edit-record">Click Here to go back</a>';
        }





}
