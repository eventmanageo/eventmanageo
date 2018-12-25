<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventManager;
use Illuminate\Support\Facades\Hash;

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
                'eventmanagername' => ['required','string','max:100','min:3'],
                'eventmanageremail' => ['required','string','email','unique:eventmanager'],
                'eventmanagerpassword' => ['required','string','min:6','confirmed'],
            ],
            [
                'eventmanagername.min' => 'Should have minimum 3 characters',
                'eventmanagerpassword.min' => 'Should have minimum 6 character/digits',
                'eventmanagerpassword.confirmed' => 'Both password should match',
            ]
        );

        $eventmanager = EventManager::create([
            'eventmanagername' => $request['eventmanagername'],
            'eventmanageremail' => $request['eventmanageremail'],
            'eventmanagerpassword' => Hash::make($request['eventmanagerpassword']),
        ]);

        if($eventmanager->wasRecentlyCreated === true){
            $request->session()->flash('alert-success','Event manager successfully added');   
        }else{
            $request->session()->flash('alert-danger','Failed! Try after some time.');
        }
        return redirect()->to('admin/eventmanager-reg');
    }
}
