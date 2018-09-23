<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/agent/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.guest')->except('logout');
    }

    public function index(){
        return redirect()->route('student.login');
    }

    public function showLoginForm(){
        return view('student.auth.login');
    }

    // Logout method with guard logout for student only
 public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('student.login');
    }
    
    // defining auth  guard
    protected function guard()
    {
        return Auth::guard('student');
    }
}
