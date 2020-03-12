<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\Validated;
use App\Rules\ValidatedAndNotDisabled;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;

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

    /**
     * @Login method from AuthenticatorController
     */
    public function login(Request $request)
    {
        $request->validate([
            // 'email'         =>  'required|string|email|exists:users,email,active,1',
            'email'         => ['required', 'string', 'email', new ValidatedAndNotDisabled, new Validated],
            'password'      =>  'required|string',
        ]);

        $credentials = [
            'email'         => $request->email,
            'password'      => $request->password,
            'active'        => 1
        ];

        $logged_in   =   Auth::attempt($credentials);

        if( $logged_in )
        {
            $messages = [
                ['content' => 'Login successfully.', 'status' => 'success']
            ];

            return redirect('home')->with('messages', $messages);
        }else{
            $messages = [
                ['content' => 'Login failed.', 'status' => 'error']
            ];
            return redirect('login')->with('messages', $messages);
        }
    }
}
