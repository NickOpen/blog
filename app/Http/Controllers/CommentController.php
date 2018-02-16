<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return Comment::all();
    }

    public function show($id){
        return Comment::find($id);
    }

    public function update(Request $request, $id){
        $comment = Comment::find($id);
        $comment->update($request->all());

        return $comment;
    }

    public function delete(Request $request, $id){
        $comment = Comment::find($id);
        $comment->delete();

        return 204;
    }

    public function store(Request $request)
    {
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
