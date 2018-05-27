@extends('master')

@section('title')
input
@stop

@section('body')
<h1>Todo List</h1>
<form action="{{action('IndexController@res')}}" method="post">
name: <input type="input" name="name" value="{{old('name')}}"><br>
todo: <input type="input" name="todo" value="{{old('todo')}}"><br>
<input type="submit" value="SEND">
</form>
<div>
{{$errors->first('name')}}
{{$errors->first('todo')}}
</div>
@stop