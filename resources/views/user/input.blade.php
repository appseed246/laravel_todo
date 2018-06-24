@extends('layouts.master') 
@section('title', 'Todoリスト') 
@section('body')
<h1 class="text-center">Todo List</h1>
@if (session('status'))
<div class="alert alert-info">
    {{session('status')}}
</div>
@endif
<form action="{{ route('user.confirm') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="control-label">名前</label>
        <input type="input" class="form-control" id="name" name="name" value="{{old('name')}}">
        <div class="text-danger">{{$errors->first('name')}}</div>
    </div>
    <div class="form-group">
        <label for="content" class="control-label">タスク</label>
        <input type="input" class="form-control" id="content" name="content" value="{{old('content')}}">
        <div class="text-danger">{{$errors->first('content')}}</div>
    </div>
    <div class="form-group">
        <label for="limit" class="control-label">期限</label>
        <input type="text" class="form-control" id="limit" name="limit" value="{{old('limit')}}">
        <div class="text-danger">{{$errors->first('limit')}}</div>
    </div>
    <button type="submit" id="submit" class="btn btn-info mx-auto d-block">内容確認</button>
</form>
<table class="table table-striped">
    <thead>
        <th scope="col">No.</th>
        <th scope="col">登録者</th>
        <th scope="col">タスク</th>
        <th scope="col">期限</th>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>
                {{ $task->id }}
            </td>
            <td>
                {{ $task->user->profile->fullname }}
            </td>
            <td>
                {{ $task->content }}
            </td>
            <td>
                @if(is_null($task->limit)) なし @else {{ $task->limit }} @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection