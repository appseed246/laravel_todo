@extends('master') 

@section('title')
Todoリスト
@stop

@section('body')
<h1>Todo List</h1>
<div>
    @if (session('status'))
        <div>
            {{session('status')}}
        </div>
        <br>
    @endif
</div>
<form action="{{action('IndexController@confirm')}}" method="post">
    <div>
        名前: <input type="input" name="name" value="{{old('name')}}">
        <div>{{$errors->first('name')}}</div>
    </div>
    <br>
    <div>
        タスク: <input type="input" name="task" value="{{old('task')}}">
        <div>{{$errors->first('task')}}</div>
    </div>
    <br>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="SEND">
</form>
@stop