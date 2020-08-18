<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\confirmRegistration;
use App\Models\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function login(Request $request)
    {
        $request->validate([
            $request->email=> 'required|email',
            $request->password => 'required',
        ]);

        $user = User::where('email',$request->email)->first();
        if ($user->status==1) {
    if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
                        

                        return ridirect()->intended(route('index'));
                    }else

                    {
                          session()->flash('error_s','login first');
      return redirect()->login();
                    }
                    }else
                    {
                             
                           if (!is_null($user)) {
                               $user -> notify(new confirmRegistration($user));
                               session()->flash('success','A New confirmation email has sent to you');
      return redirect('/');
                             }  else
                             {
        session()->flash('error_s','login first');
      return redirect()->login();
                             }

                    }

         
        }
    }

