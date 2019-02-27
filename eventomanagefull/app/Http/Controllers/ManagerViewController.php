<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ManagerViewController extends Controller
{
    public function cart(){
        return view('eventmanager.cart');
    }

    public function index() {        
        $users = DB::select('select * from vendors WHERE id');
        return view('eventmanager.vendor',['users'=>$users]);
        

        //for edit vendors details

        $users = DB::select('select * from vendors');
        return view('eventmanager.vendor_update',['users'=>$users]);
        }
        public function show($id) {
        $users = DB::select('select * from vendors where id = ?',[$id]);
        return view('eventmanager.vendor_update',['users'=>$users]);
        }
        public function edit(Request $request,$id) {
        $name = $request->input('name');
        $category = $request->input('category');
        $email = $request->input('email');
        $contact = $request->input('contact');
        $address = $request->input('address');
        //$data=array('name'=>$name,"category=>$category,"email"=>$email,"contact"=>$contact,"address"=>$address);
        //DB::table('vendors')->update($data);
        // DB::table('vendors')->whereIn('id', $id)->update($request->all());
        DB::update('update vendors set name = ?,category=?,email=?,contact=?,address=? where id = ?',[$name,$category,$email,$contact,$address,$id]);
        echo "Record updated successfully.
        ";
        echo '<a href="/edit-records">Click Here</a>';
        }

        //for delete vendor
        public function destroy($id) {
            DB::delete('delete from vendors where id = ?',[$id]);
            echo "Record deleted successfully.
            ";
            echo '<a href="/edit-records">Click Here to go back</a>';
            }

        //for search vendor
        public function search(Request $request){
                if($request->ajax())
            {
            $output="";
            $users=DB::table('vendors')->where('title','LIKE','%'.$request->search."%")->get();
            if($users)
            {
            foreach ($users as $value) {
            $output.='<tr>'.
            '<td>'.$value->id.'</td>'.
            '<td>'.$value->name.'</td>'.
            '<td>'.$value->category.'</td>'.
            '<td>'.$value->email.'</td>'.
            '<td>'.$value->contact.'</td>'.
            '<td>'.$value->address.'</td>'.
            
            '</tr>';
            }
            return Response($output);
            }
            }
            }




}
