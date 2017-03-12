<?php

namespace Caribbean\Http\Controllers\Auth;

use Illuminate\Cookie\CookieJar;
use Session;
use Caribbean\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function setToken(Request $request, CookieJar $cookieJar) {
        return $cookieJar->queue(cookie('token', $request->input('token'), 45000));
        //return $request->session()->put('token', $request->input('token'));
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Cookie::queue(Cookie::forget('token'));
        return redirect('/login');
    }
}