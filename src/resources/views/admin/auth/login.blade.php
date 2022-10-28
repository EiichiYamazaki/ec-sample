@extends('admin.layouts.app')
@section('content')
  <form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div>
      email : <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
      password : <input type="password" name="password" value="">
    </div>
    <div>
      <button type="submit">ログイン</button>
    </div>
    <div>
      <a href="{{ route('admin.password.request') }}">パスワードを忘れた方へ</a>
    </div>
    <div>
      <a href="{{ route('admin.register') }}">新規登録</a>
    </div>
  </form>
@endsection