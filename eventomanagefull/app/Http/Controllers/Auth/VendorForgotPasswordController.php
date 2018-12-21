<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class VendorForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    protected function showLinkRequestForm(){
        /* return view('auth.passwords.vendor-email', ['url' => 'vendor']); */
        return view('auth.passwords.vendor-email');
    }

    //defining which password broker to use, in our case its the vendors
    protected function broker() {
        return Password::broker('vendors');
    }
}
