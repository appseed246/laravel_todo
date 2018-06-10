@extends('master') 
@section('title', 'ログイン') 
@section('body')
<div class="">
    <h1 class="text-center">ログイン</h1>
    <form action="{{action('AdminController@login')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id" class="control-label">ID</label>
            <input type="text" class="form-control" id="id" name="id" value="{{old('id')}}">
            <div class="text-danger">{{$errors->first('id')}}</div>
        </div>
        <div class="from-group">
            <label for="password" class="control-label">パスワード</label>
            <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
            <div class="text-danger">{{$errors->first('password')}}</div>
        </div>
        <button type="submit" id="submit" class="btn btn-info mx-auto d-block">ログイン</button>
    </form>
</div>
@endsection