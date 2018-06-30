@extends('layouts.master') 
@section('title', 'ログイン') 
@section('body')
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <h1 class="text-center">ログイン</h1>
        @if (session('status'))
        <div class="alert alert-danger">
            {{session('status')}}
        </div>
        @endif
        <form action="{{ route($route_name) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" class="form-control" id="login_id" name="login_id" value="{{old('login_id')}}">
                <div class="text-danger">{{$errors->first('login_id')}}</div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">パスワード</label>
                <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                <div class="text-danger">{{$errors->first('password')}}</div>
            </div>
            <button type="submit" id="submit" class="btn btn-info">ログイン</button>
        </form>
    </div>
</div>
@endsection