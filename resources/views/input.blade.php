@extends('master')

@section('title')
input
@stop

@section('body')
<h1>Todo List</h1>
<form action="{{action('IndexController@res')}}" method="post">
name: <input type="input" name="name" value="{{old('name')}}"><br>
todo: <input type="input" name="todo" value="{{old('todo')}}"><br>
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="submit" value="SEND">
</form>
<div>
@if (isset($name))
    <p>{{$name}}</p>
@endif
@if (isset($todo))
    <p>{{$todo}}</p>
@endif
</div>
@stop