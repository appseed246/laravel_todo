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
<div>
    <form action="{{action('IndexController@confirm')}}" method="post">
        <div>
            名前: <input type="input" name="name" value="{{old('name')}}">
            <div>{{$errors->first('name')}}</div>
        </div>
        <br>
        <div>
            タスク: <input type="input" name="content" value="{{old('content')}}">
            <div>{{$errors->first('content')}}</div>
        </div>
        <br>
        <div>
        期限: <input type="text" name="limit" value="{{old('limit')}}">
        <div>{{$errors->first('limit')}}</div>
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        {{ csrf_field() }}
        <input type="submit" value="内容確認">
    </form>
</div>
{{-- @php
var_dump($tasks);
@endphp --}}
<br>
<div>
    <table>
        <thead>
            <th>登録者</th>
            <th>タスク</th>
            <th>期限</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>
                    <div>{{ $task->name }}</div>
                </td>
                <td>
                    <div>{{ $task->content }}</div>
                </td>
                <td>
                    <div>
                        @if(is_null($task->limit))
                            なし
                        @else
                            {{ $task->limit }}
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop