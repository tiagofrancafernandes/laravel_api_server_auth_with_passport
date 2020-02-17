<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Events\EventNewUserRegister;
use App\User;

class AuthenticatorController extends Controller
{

    /**
     * @Register method from AuthenticatorController
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'          =>  'required|string',
            'email'         =>  'required|string|email|unique:users',
            'password'      =>  'required|string|confirmed',
        ]);

        $user = new User([
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'password'      =>  bcrypt($request->password),
            'token'         =>  Str::random(60),
        ]);
        $user->save();

        event(new EventNewUserRegister($user));

        $res    =   ['res'   =>  'User created successfully!'];
        if(!$user->active)
        {
            $res['next_step']    =   'Validate the account. An email has been sent.';
        }

        return response()->json($res, 201);
    }

    /**
     * @register_activate method from AuthenticatorController
     */
    public function register_activate($id, $token)
    {
        $user= User::find($id);

        if($user && $user->token ==  $token)
        {
            $user->active    =  true;
            $user->token     =  '';
            $user->save();

            return view('account_sign_up/account_activated');
        }

        return view('account_sign_up/error_to_validate');
    }

    /**
     * @Login method from AuthenticatorController
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'         =>  'required|string|email',
            'password'      =>  'required|string',
        ]);

        $credentials = [
            'email'         => $request->email,
            'password'      => $request->password,
            'active'        => 1
        ];

        $logged_in   =   Auth::attempt($credentials);

        if( ! $logged_in )
        {
            return response()->json([
                'res'       => 'Denied access'
            ], 401);
        }


        $user       =   $request->user();
        $token      =   $user->createToken('Access token')->accessToken;

        return response()->json([
            'token'     => $token
        ], 200);
    }

    /**
     * @Logout method from AuthenticatorController
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'res'       =>  'Logged out successfully!'
        ], 200);
    }
}
