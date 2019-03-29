<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class ManagerViewController extends Controller

{


    public function index() {    
        
        #vendor view    
        $users = DB::select('select * from vendors');
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

        


        #allocate event view   
        
        public function allocate(){ 
            

/*
        $result = User::join('event_basic_details', 'users.id',   '=', 'event_basic_details.event_manager_id')
        ->join('users', 'event_basic_details.event_manager_id', '=', 'users.id')
        ->select('users.id', 'users.name', 'event_basic_details.event_name')
        ->get();*/


            /*$users = DB::table('event_basic_details')
                ->select('event_manager_id')
                ->join('users', 'users.id', '=', 'event_basic_details.event_manager_id')
                ->get();
*/
            $users = DB::table('SELECT event_basic_details.event_manager_id, users.id
            FROM event_basic_details
            FULL OUTER JOIN users ON event_basic_details.event_manager_id = users.id WHERE id=1');
            
        //  $users = DB::select('select * from event_basic_details');
            return view('eventmanager.allocate_event')->with('user',$users);
        








        }

        public function details(){
            return view('eventmanager.event_details');
        }

        public function add_service(){
            return view('eventmanager.add_service');
        }








}
