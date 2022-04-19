<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $verified = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:10'
        ], [
            'email.required' => trans('auth.failed'),
            'password.required' => trans('auth.failed'),
        ]);

        if (Auth::attempt(['email' => $verified['email'], 'password' => $verified['password']])) {
            $token = auth()->user()->createToken('tokenName')->plainTextToken;

            $responseBody = [
                'status' => 200,
                'token' => $token,
                'authInfo' => auth()->user()->load(['profile'])
            ];
        } else {
            $responseBody = [
                'status' => 201,
                'message' => 'Login in Successful'
            ];
        }

        return response()->json([
            'body' => $responseBody,

        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:8',

        ], [
            'email.required' => 'Email address is required',
            'password.required' => 'A password is required',
        ]);

        $userID = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])->id;

        Profile::create([
            'user_id' => $userID,
            'about' => 'Ready to help',
        ]);

        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        )) {
            $token = auth()->user()->createToken('tokenName')->plainTextToken;

            $responseBody = [
                'status' => 200,
                'token' => $token,
                'authInfo' => auth()->user()->load(['profile'])
            ];
        } else {
            $responseBody = [
                'status' => 201,
                'message' => 'Login in Successful'
            ];
        }

        return response()->json([
            'status' => http_response_code(),
            'body' => $responseBody,
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        // Auth::logout();

        return response()->json([
            'message' => 'Logged Out',
        ]);
    }
}
