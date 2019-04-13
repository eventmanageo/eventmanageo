<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Vendor;
use Session;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
        $this->middleware('guest:eventmanager')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput([$request->only('email', 'remember'),'status-failed'=>'Please check email/password.']);
    }

    public function showVendorLoginForm()
    {
        return view('auth.login', ['url' => 'vendor']);
    }

    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $vendor = Vendor::where('email','=',$request['email'])->first();
            if($vendor != null){
                Session::put('vendor_category',$vendor['category']);
                Session::put('vendor_email',$request['email']);
                return redirect()->intended('/vendor');
            }
        }

        return back()->withInput([$request->only('email', 'remember'),'status-failed'=>'Please check email/password.']);
    }

    public function showEventManagerLoginForm()
    {
        return view('auth.login', ['url' => 'eventmanager']);
    }

    public function eventmanagerLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        Session::put('eventmanager_email',$request['email']);
        if (Auth::guard('eventmanager')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/eventmanager');
        }
        return back()->withInput([$request->only('email', 'remember'),'status-failed'=>'Please check email/password.']);
    }
}
