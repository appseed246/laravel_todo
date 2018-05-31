@extends('master') 

@section('title', 'Todoリスト')

@section('body')
<div class="container">
    <h1 class="text-center">Todo List</h1>
    @if (session('status'))
        <div class="alert alert-info">
            {{session('status')}}
        </div>
    @endif
    <form class="form-horizontal" action="{{action('IndexController@confirm')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="control-label">名前</label>
            <div>
                <input type="input" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
        <div class="form-group">
            <label for="content" class="control-label">タスク</label>
            <div>
                <input type="input" class="form-control" name="content" value="{{old('content')}}">
            </div>
            <div class="text-danger">{{$errors->first('content')}}</div>
        </div>
        <div class="form-group">
            <label for="limit" class="control-label">期限</label>
            <div>
                <input type="text" class="form-control" name="limit" value="{{old('limit')}}">
            </div>
            <div class="text-danger">{{$errors->first('limit')}}</div>
        </div>
        <button type="submit" class="btn btn-default text-left">内容確認</button>
    </form>
    <br>
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
                <th scope="row">
                    {{ $task->id }}
                </td>
                <td>
                    {{ $task->name }}
                </td>
                <td>
                    {{ $task->content }}
                </td>
                <td>
                    @if(is_null($task->limit))
                        なし
                    @else
                        {{ $task->limit }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop