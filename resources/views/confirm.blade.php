@extends('master') 
@section('title') 確認画面 
@stop 
@section('body')
<form action="{{action('IndexController@commit')}}" method="post">
名前: {{$request->name}}<br>
<input type="hidden" name="name" value="{{$request->name}}">

タスク: {{$request->content}}<br>
<input type="hidden" name="content" value="{{$request->content}}">

@if (isset($request->limit)) 期限: {{$request->limit}}<br>
<input type="hidden" name="limit" value="{{$request->limit}}">
@endif

この内容で登録を行います。よろしいですか？<br>
<input type="submit" value="登録">
<input type="button" onClick="location.href='{{action('IndexController@input')}}'" value="修正">
<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>

@stop