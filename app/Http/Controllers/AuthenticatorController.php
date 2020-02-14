<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);
        $user->save();

        return response()->json([
            'res'   =>  'User created successfully!'
        ], 201);
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
