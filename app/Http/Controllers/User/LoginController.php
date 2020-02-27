<?php

namespace App\Http\Controllers\User;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admin users for the application and
    | redirecting them to your admin dashboard.
    |
    */

    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;

    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.users.login');
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event
            $this->fireLockoutEvent($request);

            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        //attempt login.
        if(Auth::guard('web')->attempt($request->only('tckn','password'),$request->filled('remember'))){
            //Authenticated, redirect to the intended route
            //if available else user profile.
            return redirect()
                ->intended(route('user.profile'));
        }

        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);

        //Authentication failed, redirect back with input.
        return redirect()
            ->back()
            ->withInput($request->only('tckn'))
            ->withErrors('Kullanıcı adı veya Şifre yanlış!');
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()
            ->route('home')
            ->with('status','User has been logged out!');
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'tckn'    => 'required|exists:users|min:11|max:11',
            'password' => 'required|string|min:6|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'tckn.exists' => 'TC kimlik numarası sisteme kayıtlı değil!',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    /**
     * Username used in ThrottlesLogins trait
     * 
     * @return string
     */
    public function username(){
        return 'tckn';
    }
}
