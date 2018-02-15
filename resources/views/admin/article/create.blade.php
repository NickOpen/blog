@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增一片文章</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong>输入不符要求 <br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        <form action="{{url('admin/articles')}}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                            <br>
                            <textarea name="body" cols="30" rows="10" class="form-control"
                                      required="required"></textarea>
                            <button class="btn btn-lg btn-info">新增文章</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection