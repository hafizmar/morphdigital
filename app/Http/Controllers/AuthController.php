<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken; 
            Auth::login($user);
            return response()->json([
                "status" => true,
                "data" => $user,
                "token" => $token,
                "message" => "Logged in."
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Email or password is incorrect."
            ]);
        }
    }

    public function me() {
        return response()->json([
            "status" => true,
            "data" => auth()->user(),
            "message" => "Data fetched"
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return response()->json([
            "status" => true,
            "message" => "Successfully logged out."
        ]);
    }
}
