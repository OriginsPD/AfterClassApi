<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\DiscussionTag;
use App\Models\DiscussionTopic;

class DiscussionTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DiscussionTopic::has('discussionTags')
            ->with(['topic', 'like', 'category', 'discussionTags', 'user'])
            ->latest('created_at')
            ->get();

        return $query;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tagID = DiscussionTopic::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'topic_id' => $request->input('topic'),
            'category_id' => $request->input('category'),
        ])->id;

        $tagArr = collect($request->input('tag'));

        $tagArr->map(
            fn ($value) =>
            DiscussionTag::create([
                'discus_topic_id' => $tagID,
                'tag_id' => $value
            ])
        );

        return response()->json([
            'status' => http_response_code(),
            'message' => 'Discussion Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = DiscussionTopic::has('discussionTags')
            ->with(['topic', 'category', 'discussionTags', 'user', 'replies'])
            ->where('id', $id)
            ->get();

        return $query;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiscussionTopic::where('id', $id)->delete();

        return response()->json([
            'message' => 'post deleted'
        ]);
    }
}
