@extends('master')

@section('title')
確認画面
@stop

@section('body')
名前: {{$input['name']}}<br>
タスク: {{$input['task']}}<br>

この内容で登録を行います。よろしいですか？
<form action="{{action('IndexController@commit')}}" method="post">
    <input type="submit" value="登録">
    <input type="button" onClick="location.href='{{action('IndexController@input')}}'" value="修正">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
@stop