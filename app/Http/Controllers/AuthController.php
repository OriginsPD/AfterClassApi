<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:10'
        ], [
            'email.required' => trans('auth.failed'),
            'password.required' => trans('auth.failed'),
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $token = auth()->user()->createToken('tokenName')->plainTextToken;

            $responseBody = [
                'token' => $token,
                'authInfo' => auth()->user()
            ];
        } else {
            $message = 'Login in Successful';
        }

        $message = 'Login Failed';


        return response()->json([
            'status' => http_response_code(),
            'body' => $responseBody ?? $message
        ]);
    }

    public function register(Request $request)
    {
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $token = auth()->user()->createToken('tokenName')->plainTextToken;

            $responseBody = [
                'token' => $token,
                'authInfo' => auth()->user()
            ];
        } else {
            $message = 'Login in Successful';
        }

        return response()->json([
            'status' => http_response_code(),
            'body' => $responseBody ?? $message
        ]);
    }

    public function logout(Request $request)
    {

        // auth()->user()->tokens()->delete();

        // Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logged Out',
            'info' => auth()->user()
        ]);
    }
}
