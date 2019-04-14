<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventBasicDetail;
use Illuminate\Support\Facades\Auth;
use DB;
use function GuzzleHttp\json_encode;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

    }

    public function redirectToAskEventDetails(Request $request) {
        return view('end_user.ask_event_details')->with('event_type',$request['eventType']);
    }

    public function insertIntoEventBasicDetails(Request $request) {

        $event_basic_details = EventBasicDetail::create([
            'event_name' => $request['event_name'],
            'event_type' => $request['event_type'].$request['whose_marriage'],
            'event_date_from' => $request['check_in'],
            'event_date_to' => $request['check_out'],
            'event_location' => $request['event_location'],
            'no_people' => $request['no_people'],
            'event_status' => 'created',
            'user_id' => Auth::id()
        ]);

        if ($event_basic_details->wasRecentlyCreated == true) {
            return redirect()->to('/services/caterer');
        } else {
            return redirect()->to('/ask-event-details/marriage');
        }
    }

    public function redirectToServices(Request $request, $vendorType="caterer") {
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
        return view('end_user.services')->with('vendorType',$vendorType)->with('packageData', $packageData);
    }

    public function redirectToServiceDetails(Request $request, $vendorType, $itemId, $vendorId) {
        if ($vendorType == "caterer") {
            $packageDetails = DB::table('package_caterers')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $catererItem = DB::table('caterer_items')
            ->select('caterer_items.id','caterer_items.item_name', 'caterer_items.item_description', 'caterer_items.item_dine_time', 'caterer_items.item_category', 'caterer_items.item_price')
            ->join('package_caterer_items','package_caterer_items.item_id','=','caterer_items.id')
            ->where('package_caterer_items.package_id','=',$itemId)
            ->get();
            
            return view('end_user.service_details')->with('packageDetails',$packageDetails)->with('catererItem',$catererItem);
        } else if ($vendorType == "makeup") {
            $packageDetails = DB::table('package_makeups')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $makeupItem = DB::table('makeup_items')
            ->select('makeup_items.id','makeup_items.item_name', 'makeup_items.item_description', 'makeup_items.item_price')
            ->join('package_makeup_items','package_makeup_items.item_id','=','makeup_items.id')
            ->where('package_makeup_items.package_id','=',$itemId)
            ->get();
            return view('end_user.service_details')->with('packageDetails',$packageDetails)->with('makeupItem',$makeupItem);
        } else if ($vendorType == "photographer") {
            $packageDetails = DB::table('package_photographers')->where('vendor_id', '=', $vendorId)->where('id','=',$itemId)->get();
            $photographerItem = DB::table('photographer_services')
            ->select('photographer_services.id','photographer_services.item_name', 'photographer_services.item_description', 'photographer_services.item_price')
            ->join('package_photographer_items','package_photographer_items.item_id','=','photographer_services.id')
            ->where('package_photographer_items.package_id','=',$itemId)
            ->get();
            return view('end_user.service_details')->with('packageDetails',$packageDetails)->with('photographerItem',$photographerItem);
        }
    }

    public function returnEvents(Request $request){
        $eventDetails = DB::table('event_basic_details')->where('user_id','=',$request['userid'])->where('event_status','=','created')->get();
        echo json_encode($eventDetails);
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

    public function myBag(Request $request) {
        $uid = Auth::id();
        $eventDetails = DB::table('event_basic_details')->where('user_id','=',$uid)->where('event_status','=','created')->get();
        return view('end_user.my_bag')->with('eventDetails',$eventDetails);
    }

    public function showEventItems(Request $request, $eventId) {
        return view('end_user.event_item_details')->with('eventId',$eventId);
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

    function publishEvent(Request $request) {
        $eventId = $request['eventId'];
        DB::update('update event_basic_details set event_status = ? where id = ?',['published',$eventId]);
        echo "ok";
    }

    function myOrder(Request $request) {
        $uid = Auth::id();
        $eventDetails = DB::select("SELECT * FROM event_basic_details WHERE user_id = $uid AND event_status = 'completed' OR event_status = 'published' OR event_status = 'confirmed'");
        // $eventDetails = DB::table('event_basic_details')->where('user_id','=',$uid)->where('event_status','=','completed')->get();
        return view('end_user.myorder')->with('eventDetails',$eventDetails);
    }

    function removeItem(Request $request) {
        $itemId = (int)$request['itemId'];
        $removeItem = DB::table('user_caterers')->where('id',$itemId)->delete();
        if ($removeItem) {
            return "ok";
        } else {
            return "notok";
        }
    }
    public function viewuserprofile()
    {
        $user_id = Auth::id();
        $userprofile = DB::select("SELECT * FROM users WHERE id = $user_id");
        return view('end_user.profile')->with('profile',$userprofile);       
    }
    //for edit vendors details
    
    public function show($id) {
        $user_id = Auth::id();
        $profile = DB::select("select * from users where id =$user_id");
        return view('end_user.updateprofile');
    }


        public function edit(Request $request,$id) {
            $user_id = Auth::id();
            $name = $request->input('name');
            $email = $request->input('email');
            $contact = $request->input('contact');
            $address = $request->input('address');
            DB::update('update users set name = ?,email=?,contact=?,address=? where id = $user_id',[$name,$email,$contact,$address]);
            echo "Record updated successfully.";
            echo '<a href="end_user/profile"> Click Here</a>';
            }







   








    public function insertform(){
        return view('admin.viewContact');
    } 
    public function insert(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $des = $request->input('description');
        $data=array('name'=>$name,"email"=>$email,"subject"=>$subject,"Description"=>$des);
        DB::table('users_contactus')->insert($data);
        return redirect()->back();
    }

    public function viewRequest()
    {
        return view('admin.viewContact');
    }
}
