<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DiscussionTopic;
use Illuminate\Http\Request;

class DiscussionViewController extends Controller
{
    public function index()
    {
        $query = DiscussionTopic::has('discussionTags')
            ->with(['topic', 'like', 'category', 'discussionTags', 'user', 'view'])
            ->latest('created_at')
            ->limit(3)
            ->get();

        return $query;
    }
}
