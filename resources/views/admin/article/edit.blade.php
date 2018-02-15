@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">修改文章</div>
                    <div class="panel-body">
                        <form action="{{url('admin/articles/'.$article->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="text" name="title" class="form-control" required="required"
                                   value="{{$article->title}}"
                                   placeholder="请输入标题">
                            <br>
                            <textarea name="body" cols="30" rows="10" class="form-control"
                                      required="required">{{$article->body}}</textarea>
                            <button class="btn btn-lg btn-info">更新文章</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
