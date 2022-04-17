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
            'image' => 'sometimes|image'
        ]);

        User::where('id', 10)
            ->update([
                'username' => $request->input('username')
            ]);

        Profile::where('user_id', 10)
            ->update([
                'about' => 'Hello I am testing',
                'imgUrl' => $request->file('image')->store('/', 'avatar')
            ]);

        return response()->json([
            'status' => http_response_code()
        ]);
    }
}
