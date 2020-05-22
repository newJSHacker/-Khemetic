<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use Flash;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function loginView(Request $request){
        return view('auth.login-admin');
    }


    public function login(Request $request){
        $email = $request->email;
        $pwd = $request->password;
        $remember = true; //isset($request->remember);

        /*$user = \App\User::find(1);
        $user->password = Hash::make("test123");
        $user->save();

        $user = \App\User::find(2);
        $user->password = Hash::make("test123");
        $user->save();*/

        if (Auth::attempt(['email' => $email, 'password' => $pwd], $remember)) {
            // The user is being remembered...
            if(auth()->user()->isAdmin()){
                //dd(auth()->user()->getRoleNames());
                return redirect(route('dashboard'));
            }else{
                Auth::logout();
                $msg = "Permition denied, use login button to login ";
                Flash::warning("Warning", $msg);
                alert()->warning("Warning", $msg)->autoClose(10000);
                return redirect("/");
            }

        }


        Flash::error("incorrect email or password");
        alert()->error("", 'incorrect email or password')->autoClose(10000);
        return back()->withInput($request->input());

    }



}
