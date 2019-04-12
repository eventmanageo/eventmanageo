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
        
<<<<<<< HEAD
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
        





=======
        public function allocate(){        
>>>>>>> 1e52c8f45462c6052453b78ee1075fb7a0628849

            $users=DB::table('users')
            ->join('event_basic_details','event_basic_details.users_id','=','users.id')
            ->select('event_basic_details.id AS eid','users.name','event_basic_details.event_name','event_basic_details.event_date_to','event_basic_details.event_date_from')
            ->get();
            return view('eventmanager.allocate_event',['users'=>$users]);
    


        }
        
        public function profile(){
            
            $manager_id = Auth::id();
            $managerprofile = DB::select("SELECT * FROM eventmanager WHERE id = $manager_id");
    
            return view('eventmanager.profile')->with('profile',$managerprofile);  


        }

        public function add_service(){
            return view('eventmanager.add_service');
        }
        public function view_event_detail(){
            return view('eventmanager.View_event_detail');
        }

        public function getEventItem(Request $request){
            if ($request['vendorType'] == "caterer") {
                $catererItemUser = DB::table('user_caterers')
                ->join('package_caterers','user_caterers.package_id','=','package_caterers.id')
                ->where('user_caterers.event_id','=',$request['eventId'])->get();
                if (!empty($catererItemUser)) {
                    echo json_encode($catererItemUser);   
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "makeup") {
                $makeupItemUser = DB::table('user_makeups')
                ->join('package_makeups','user_makeups.package_id','=','package_makeups.id')
                ->where('user_makeups.event_id','=',$request['eventId'])->get();
                if (!empty($makeupItemUser)) {
                    echo json_encode($makeupItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "photographer") {
                $photographerItemUser = DB::table('user_photographers')
                ->join('package_photographers','user_photographers.package_id','=','package_photographers.id')
                ->where('user_photographers.event_id','=',$request['eventId'])->get();
                if (!empty($photographerItemUser)) {
                    echo json_encode($photographerItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "decorator") {
                $decoratorItemUser = DB::table('user_decorators')
                ->select('user_decorators.id AS iId')
                ->join('decorator_services','user_decorators.decorator_service_id','=','decorator_services.id')
                ->where('user_decorators.event_id','=',$request['eventId'])->get();
                if (!empty($decoratorItemUser)) {
                    echo json_encode($decoratorItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "sound") {
                $soundItemUser = DB::table('user_sounds')
                ->join('sound_services','user_sounds.sound_service_id','=','sound_services.id')
                ->where('user_sounds.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "transport") {
                $soundItemUser = DB::table('user_transports')
                ->join('transport_services','user_transports.transport_service_id','=','transport_services.id')
                ->where('user_transports.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "land") {
                $soundItemUser = DB::table('user_land')
                ->join('land_services','user_land.land_service_id','=','land_services.id')
                ->where('user_land.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            }
        }
}


