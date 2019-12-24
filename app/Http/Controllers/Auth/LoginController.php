<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    }

    protected function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);

        return redirect($this->redirectTo);
    }

//   LOGIN WITH FACEBOOK

    /** Redirect the user to the Facebook authentication page */
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**  Obtain the user information from Facebook. */
    public function handleProviderCallbackFacebook(Request $request)
    {
        $userGoogle = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $userGoogle->email)->first();

        if($findUser){
            $user = $findUser;
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->getClientIp();
            $user->update();
        } else{
            $user = new User();
            $user->name = $userGoogle->getName();
            $user->email = $userGoogle->getEmail();
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make(12345678);
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->getClientIp();
            $user->save();
        }
        Auth::login($user);
         return redirect($this->redirectTo);
    }

//    LOGIN WITH GOOGLE

    /** Redirect the user to the Google authentication page */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /** Obtain the user information from Google. */
    public function handleProviderCallbackGoogle(Request $request)
    {
        $userGoogle = Socialite::driver('google')->user();

        $findUser = User::where('email', $userGoogle->email)->first();

        if($findUser){
            $user = $findUser;
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->getClientIp();
            $user->update();
        } else{
            $user = new User();
            $user->name = $userGoogle->getName();
            $user->email = $userGoogle->getEmail();
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make(12345678);
            $user->last_login_at = Carbon::now()->toDateTimeString();
            $user->last_login_ip = $request->getClientIp();
            $user->save();
        }
        Auth::login($user);
        return redirect($this->redirectTo);
    }
}
