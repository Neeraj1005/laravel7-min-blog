<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
    #Below these 2 methods are also working, If you don't want to use the middleware then user any of two below methods
    // protected function credentials(Request $request)//working
    // {
    //     return array_merge($request->only($this->username(), 'password'), ['is_active' => 1]);
    // }

    // protected function authenticated(Request $request, $user) //working
    // {
    //     if ($user->is_active !== 1) {

    //         Auth::logout();

    //         return redirect('login')->with('message','your account has been blocked!');
    //     }
    // }

    */
}
