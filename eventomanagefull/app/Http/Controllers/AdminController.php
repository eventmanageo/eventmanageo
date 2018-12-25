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
}
