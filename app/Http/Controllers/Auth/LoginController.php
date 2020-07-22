<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/mycv';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        /*session()->forget('from');
        if(!session()->has('from') && (url()->previous()!=url('/'))){
            session()->put('from', url()->previous());
        }
        elseif(session()->has('from') && (session()->pull('from')==url('/')))
            session()->forget('from');*/
        return view('auth.login');
    }

    public function authenticated($request,$user)
    {
        //return redirect()->intended(session()->pull('from',$this->redirectTo))->with('success-msg','Welcome '.$user->name);
        return redirect()->intended($this->redirectTo)->with('success-msg','Welcome '.$user->name);
    }
}
