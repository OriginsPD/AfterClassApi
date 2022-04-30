<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $query = $request->validate([
            'content' => 'required|min:10|max:244',
            'replyId' => 'required',
        ]);

        return (Comment::create([
            'user_id' => auth()->id(),
            'content' => $query['content'],
            'reply_id' => $query['replyId']
        ]))
            ?  response()->json([
                'status' => http_response_code(),
                'message' => 'Comment Created Successful'
            ])
            : null;


        return response()->json([
            'status' => 500
        ]);
    }
}
