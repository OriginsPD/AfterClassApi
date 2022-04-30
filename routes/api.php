<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscussionTopicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

// Discussion Topic
Route::apiResource('/dtopic', DiscussionTopicController::class)->only(['index', 'show']);

// Tag
Route::apiResource('/tag', TagController::class);

// Category
Route::apiResource('/category', CategoryController::class);

// Topic
Route::apiResource('/topic', TopicController::class);


Route::get('/member', [ProfileController::class, 'memberIndex']);

// View Counter
Route::get('/viewCount/{id}', [ViewController::class, 'viewCount']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    // Discussion Topic
    Route::apiResource('/dtopic', DiscussionTopicController::class)->except(['index', 'show']);

    // Like
    Route::post('/like', [LikeController::class, 'like']);
    Route::post('/unLike', [LikeController::class, 'unlike']);

    // Reply 
    Route::apiResource('/reply', ReplyController::class);

    Route::post('/comment', [CommentController::class, 'store']);

    // Profile 
    Route::post('/userProfile', [ProfileController::class, 'updateProfile']);

    // Auth Logout
    Route::get('/logout', [AuthController::class, 'logout']);
});
