<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\EventManager;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_encode;

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

            $users=DB::table('users')
            ->join('event_basic_details','event_basic_details.user_id','=','users.id')
            ->select('event_basic_details.id AS eid','users.name','event_basic_details.event_name','event_basic_details.event_date_to','event_basic_details.event_date_from')
            ->where('event_basic_details.event_status','=','assigned')
            ->get();
            return view('eventmanager.allocate_event',['users'=>$users]);
    


        }
        
        public function profile(){
            
            $eventmanager_email = Session::get('eventmanager_email');
            $managerprofile = DB::table('eventmanager')->where('email','=',$eventmanager_email)->get();
            return view('eventmanager.profile')->with('profile',$managerprofile);  


        }

        public function add_service(){
            return view('eventmanager.add_service');
        }
        public function view_event_detail($eventId){
            $eventDetails = DB::table('event_basic_details')->where('id','=',$eventId)->get();
            $name = $eventDetails[0]->event_name;
            return view('eventmanager.View_event_detail')->with('name',$name);
        }

        public function getEventItem(Request $request){
            if ($request['vendorType'] == "caterer") {
                $catererItemUser = DB::table('user_caterers')
                ->select('user_caterers.id AS ucid','user_caterers.event_id','package_caterers.package_name','package_caterers.package_description')
                ->join('package_caterers','user_caterers.package_id','=','package_caterers.id')
                ->where('user_caterers.event_id','=',$request['eventId'])->get();
                if (!empty($catererItemUser)) {
                    echo json_encode($catererItemUser);   
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "makeup") {
                $makeupItemUser = DB::table('user_makeups')
                ->select('user_makeups.id','user_makeups.event_id','package_makeups.package_name','package_makeups.package_description')
                ->join('package_makeups','user_makeups.package_id','=','package_makeups.id')
                ->where('user_makeups.event_id','=',$request['eventId'])->get();
                if (!empty($makeupItemUser)) {
                    echo json_encode($makeupItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "photographer") {
                $photographerItemUser = DB::table('user_photographers')
                ->select('user_photographers.id','user_photographers.event_id','package_photographers.package_name','package_photographers.package_description')
                ->join('package_photographers','user_photographers.package_id','=','package_photographers.id')
                ->where('user_photographers.event_id','=',$request['eventId'])->get();
                if (!empty($photographerItemUser)) {
                    echo json_encode($photographerItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "decorator") {
                $decoratorItemUser = DB::table('user_decorators')
                ->select('user_decorators.id','decorator_services.item_name','decorator_services.item_description')
                ->join('decorator_services','user_decorators.decorator_service_id','=','decorator_services.id')
                ->where('user_decorators.event_id','=',$request['eventId'])->get();
                if (!empty($decoratorItemUser)) {
                    echo json_encode($decoratorItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "sound") {
                $soundItemUser = DB::table('user_sounds')
                ->select('user_sounds.id','sound_services.service_name','sound_services.service_description')
                ->join('sound_services','user_sounds.sound_service_id','=','sound_services.id')
                ->where('user_sounds.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "transport") {
                $soundItemUser = DB::table('user_transports')
                ->select('user_transports.id','transport_services.vehicle_name','transport_services.vehicle_description')
                ->join('transport_services','user_transports.transport_service_id','=','transport_services.id')
                ->where('user_transports.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            } else if ($request['vendorType'] == "land") {
                $soundItemUser = DB::table('user_land')
                ->select('user_land.id','land_services.land_name','land_services.land_description')
                ->join('land_services','user_land.land_service_id','=','land_services.id')
                ->where('user_land.event_id','=',$request['eventId'])->get();
                if (!empty($soundItemUser)) {
                    echo json_encode($soundItemUser);
                }else {
                    echo "";
                }
            }
        }
    
    function confirmEvent(Request $request) {
        $eventId = $request['eventId'];

        $result = DB::table('event_basic_details')->where('id','=',$eventId)->update(['event_status'=> 'completed']);
        $request->session()->flash('status','Success');
        return redirect()->back();
    }

    function removeItem(Request $request) {
        $itemId = (int)$request['itemId'];
        if ($request['vendorType'] == "caterer") {
            $removeItem = DB::table('user_caterers')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "photographer") {
            $removeItem = DB::table('user_photographers')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "makeup") {
            $removeItem = DB::table('user_makeups')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "decorator") {
            $removeItem = DB::table('user_decorators')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "transport") {
            $removeItem = DB::table('user_transports')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "sound") {
            $removeItem = DB::table('user_sounds')->where('id',$itemId)->delete();
        } else if ($request['vendorType'] == "land") {
            $removeItem = DB::table('user_land')->where('id',$itemId)->delete();
        }
        
        if ($removeItem) {
            return "ok";
        } else {
            return "notok";
        }
    }

    function returnToAddItem(Request $request, $vendorType = "caterer") {
        $packageData = "";
        if ($vendorType == "caterer") {
            $packageData = DB::table('package_caterers')->get();
        } else if ($vendorType == "makeup") {
            $packageData = DB::table('package_makeups')->get();
        } else if ($vendorType == "photographer") {
            $packageData = DB::table('package_photographers')->get();
        } else if ($vendorType == "transport") {
            $packageData = DB::table('transport_services')->get();
        } else if ($vendorType == "decorator") {
            $packageData = DB::table('decorator_services')->get();
        } else if ($vendorType == "sound") {
            $packageData = DB::table('sound_services')->get();
        } else if ($vendorType == "land") {
            $packageData = DB::table('land_services')->get();
        }
        return view('eventmanager.add_service')->with('vendorType',$vendorType)->with('packageData', $packageData);
    }

    function returnToServiceDetails(Request $request, $vendorType, $itemId, $vendorId) {
        if ($vendorType == "caterer") {
            $packageDetails = DB::table('package_caterers')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $catererItem = DB::table('caterer_items')
            ->select('caterer_items.id','caterer_items.item_name', 'caterer_items.item_description', 'caterer_items.item_dine_time', 'caterer_items.item_category', 'caterer_items.item_price')
            ->join('package_caterer_items','package_caterer_items.item_id','=','caterer_items.id')
            ->where('package_caterer_items.package_id','=',$itemId)
            ->get();
            
            return view('eventmanager.service_details')->with('packageDetails',$packageDetails)->with('catererItem',$catererItem);
        } else if ($vendorType == "makeup") {
            $packageDetails = DB::table('package_makeups')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $makeupItem = DB::table('makeup_items')
            ->select('makeup_items.id','makeup_items.item_name', 'makeup_items.item_description', 'makeup_items.item_price')
            ->join('package_makeup_items','package_makeup_items.item_id','=','makeup_items.id')
            ->where('package_makeup_items.package_id','=',$itemId)
            ->get();
            return view('eventmanager.service_details')->with('packageDetails',$packageDetails)->with('makeupItem',$makeupItem);
        } else if ($vendorType == "photographer") {
            $packageDetails = DB::table('package_photographers')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $photographerItem = DB::table('photographer_services')
            ->select('photographer_services.id','photographer_services.item_name', 'photographer_services.item_description', 'photographer_services.item_price')
            ->join('package_photographer_items','package_photographer_items.item_id','=','photographer_services.id')
            ->where('package_photographer_items.package_id','=',$itemId)
            ->get();
            return view('eventmanager.service_details')->with('packageDetails',$packageDetails)->with('photographerItem',$photographerItem);
        }
    }

    public function saveToEvent(Request $request) {
        $data = $request['data'];
        if ($data['vType']=="caterer") {

            $id = DB::table('user_caterers')->insertGetId(array('event_id' => $data['eId'],
            'package_id'=> $data['pId'],
            'no_of_people' => $data['npeople'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType']=="makeup") {
            $id = DB::table('user_makeups')->insertGetId(array('event_id' => $data['eId'],
            'package_id'=> $data['pId'],
            'no_of_people' => $data['npeople'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType'] == "photographer") {
            $id = DB::table('user_photographers')->insertGetId(array('event_id' => $data['eId'],
            'package_id'=> $data['pId'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType'] == "decorator") {
            $id = DB::table('user_decorators')->insertGetId(array('event_id' => $data['eId'],
            'decorator_service_id'=> $data['pId'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType'] == "transport") {
            $id = DB::table('user_transports')->insertGetId(array('event_id' => $data['eId'],
            'transport_service_id'=> $data['pId'],
            'no_of_vehicle'=>$data['nV'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType'] == "land") {
            $id = DB::table('user_land')->insertGetId(array('event_id' => $data['eId'],
            'land_service_id'=> $data['pId'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        } else if ($data['vType'] == "sound") {
            $id = DB::table('user_sounds')->insertGetId(array('event_id' => $data['eId'],
            'sound_service_id'=> $data['pId'],
            'date_when_to_serve' => $data['d'],
            'time_when_to_serve' => $data['t'],
            'special_note' => $data['snote']));

            if (! empty($id)) {
                echo "ok";
            } else {
                echo "notok";
            }
        }
    }

    function eventDetails(Request $request, $eventId) {
        $eventDetails = DB::table('event_basic_details')->where('id','=',$eventId)->get();
        return view('eventmanager.event_details')->with('eventDetails',$eventDetails);
    }

    function pastEventDetails(Request $request) {
        $email = Session::get('eventmanager_email');
        $eventmanager_id = EventManager::where('email','=',$email)->first()->id;
        $eventPastDetails = DB::table('event_basic_details')->where('event_status','=','completed')->where('event_manager_id','=',$eventmanager_id)->get();
        return view('eventmanager.completedevent')->with('eventPastDetails',$eventPastDetails);
    }
}


