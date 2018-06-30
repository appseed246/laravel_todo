@extends('layouts.master')
@section('title', 'home')
@section('body')
<h1>ログインしました</h1>
<form action="{{ route('admin.logout') }}" method="post">
    {{ csrf_field() }}
    <button type="submit" id="submit" class="btn btn-info">ログアウト</button>
</form>
@endsection