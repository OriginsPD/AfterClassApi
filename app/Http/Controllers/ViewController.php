<?php

namespace App\Http\Controllers;

use App\Models\Views;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function viewCount($id)
    {

        Views::create([
            'discus_topic_id' => $id,
        ]);

        return response()->json([
            'status' => http_response_code(),
            'message' => 'Status Count',
        ]);
    }
}
