<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        Like::create([
            'user_id' => $request->input('id'),
            'item_id' => $request->input('itemID'),
            'item_topic' => $request->input('itemTopic')
        ]);
    }

    public function unLike(Request $request)
    {
        Like::where('user_id', $request->input('id'))
            ->where('item_id', $request->input('itemID'))
            ->where('item_topic', $request->input('itemTopic'))
            ->delete();
    }
}
