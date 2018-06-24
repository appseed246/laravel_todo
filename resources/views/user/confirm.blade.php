@extends('layouts.master') 
@section('title', '確認画面') 
@section('body')
<form action="{{action('IndexController@commit')}}" method="post">
    <div>
        名前: {{$request->name}}
    </div>
    <div>
        タスク: {{$request->content}}<br>
    </div>
    @if (isset($request->limit))
    <div>
        期限: {{$request->limit}}<br>
    </div>
    @endif
    <div>
        この内容で登録を行います。よろしいですか？
    </div>
    <input type="submit" value="登録">
    <input type="button" onClick="location.href='{{action('IndexController@input')}}'" value="修正"> {{ csrf_field() }}
</form>


@stop