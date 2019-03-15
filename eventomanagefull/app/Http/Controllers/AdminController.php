<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventManager;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }

    protected function goToEventManagerRegistration(Request $request){
        return view('admin.eventmanagerRegister');
    }

    protected function registerEventManager(Request $request){
        $this->validate($request,[
                'name' => ['required','string','max:100','min:3'],
                'email' => ['required','string','email','unique:eventmanager'],
                'password' => ['required','string','min:6','confirmed'],
            ],
            [
                'name.min' => 'Should have minimum 3 characters',
                'password.min' => 'Should have minimum 6 character/digits',
                'password.confirmed' => 'Both password should match',
            ]
        );

        $eventmanager = EventManager::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($eventmanager->wasRecentlyCreated === true){
            $request->session()->flash('alert-success','Event manager successfully added');   
        }else{
            $request->session()->flash('alert-danger','Failed! Try after some time.');
        }
        return redirect()->to('admin/eventmanager-reg');
    }

    protected function goToEventManagerRemove(){
        $eventmanagers = EventManager::paginate(10);
        return view('admin.eventmanagerRemove',compact('eventmanagers'));
    }

    protected function removeEventManager(Request $request){
        $id = $request['id'];
        $eventmanager = EventManager::findOrFail($id);

        if($eventmanager->delete()){
            $request->session()->flash('alert-success','Event manager successfully deleted');
        }else{
            $request->session()->flash('alert-danger','Failed! Try after some time.');
        }
        return redirect()->to('admin/eventmanager-remove');
    }

    public function showEventManagerAllocatePage(){
        $eventDetails = DB::table('event_basic_details')->where('event_status','=','published')->get();
        return view('admin.allocateEventManager')->with('eventDetails',$eventDetails);
    }

    public function returnEventMangerList(Request $request){
        
        // $eventMangerList = DB::table('eventmanager')->select('id','name')->get();
        $eventMangerList = DB::table('eventmanager')->select('id','name')
                                ->whereNotExists(function ($query) {
                                    $query->select("event_basic_details.event_manager_id")
                                        ->from('event_basic_details')
                                        ->whereRaw('event_basic_details.event_manager_id = eventmanager.id');
                                })
                                ->get();
        return json_encode($eventMangerList);
    }

    public function checkEventManagerAvailability(Request $request){
        $eventmanagerId = $request->eId;
        $eventId = $request->eventId;
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s",time());
        $eventManagerEvent = DB::table('event_basic_details')->where('event_manager_id','=',$eventmanagerId)->where('event_status','=','assigned' );
        if($eventManagerEvent->get()->count() == 0){
            $assignEventManagerUpdateRow = DB::table('event_basic_details')->where('id','=',$eventId)->where('event_status','=','published')
            ->update([
                'event_manager_id' => $eventmanagerId ,
                'time_when_assigned_to_manager' => $date,
                'event_status' => 'assigned'
            ]);

            if($assignEventManagerUpdateRow == 0){
                echo "notokwentwrong";
            }else{
                echo "ok";
            }
        }else{
            echo 'notok';
        }
    }

    public function showEventManagerAllocatedPage(){
        $eventDetails = DB::table('event_basic_details')->where('event_status','=','assigned')->get();
        return view('admin.allocatedEvents')->with('eventDetails',$eventDetails);
    }

    public function showEventManagerDetails(Request $request){
        $managerDetails = DB::table('eventmanager')->where('id','=',$request->eid)->get();
        return json_encode($managerDetails);
    }

    public function showprofile(){
        $userid = Auth::user()->id;
        $username = Auth::user()->name;
        print_r($userid);
        print_r($username);

        $admin = DB::select("SELECT * FROM admins WHERE id => $userid ");
        return view('admin.profile')->with('admindata',$admin);
    }
}
