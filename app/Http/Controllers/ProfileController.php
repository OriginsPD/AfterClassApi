<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function memberIndex()
    {
        return User::with('profile')->where('id', "!=", auth()->id())->get();
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'about' => 'required'
            // 'image' => 'sometimes|image'
        ]);

        User::where('id', auth()->id())
            ->update([
                'username' => $request->input('username')
            ]);

        Profile::where('user_id', auth()->id())
            ->update([
                'about' => $request->input('about'),
                // 'imgUrl' => $request->file('image')->store('/', 'avatar')
            ]);

        $responseBody = [
            'status' => 200,
            'authInfo' => auth()->user()->load(['profile'])
        ];

        return response()->json([
            'status' => http_response_code(),
            'body' => $responseBody,
        ]);
    }
}
