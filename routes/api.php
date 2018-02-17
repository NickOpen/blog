<?php

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\CommentCollection;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('comments/{id}', function ($id){
    //return Comment::all();
    //return CommentResource::collection(Comment::all());
    //return new CommentResource(Comment::find($id));
    //return CommentResource::collection(Comment::find($id));

    //Customized resource collection.
    return new CommentCollection(Comment::all());
});
