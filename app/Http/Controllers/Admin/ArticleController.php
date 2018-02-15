<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
class ArticleController extends Controller
{
    public function index(){
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create(){
        return view('admin/article/create');
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'title' => 'bail|required|unique:articles|max:3',
                'body' => 'required'
            ]
        );

        $article = new Article();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if($article->save()){
            return redirect('admin/articles');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function edit($id){
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update(Request $request, $id){
        \Validator::make($request->all(), [
            'title' => [
                'max:50',
                'required',
                Rule::unique('articles')->ignore($request->get('id'))
            ],
            'body' => 'required'
        ])->validate();

        $targetArticle = Article::find($id);
        $targetArticle -> title = $request->get('title');
        $targetArticle -> body = $request->get('body');

        if($targetArticle->save()){
            return redirect('admin/articles');
        }else{
            return redirect()->back()->withInput()->withErrors('修改失败');
        }
    }

    public function destroy($id){
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功!');
    }
}
