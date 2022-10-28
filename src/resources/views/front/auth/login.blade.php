@extends('front.layouts.app')
@section('content')
  <form method="POST" action="{{ route('front.login') }}">
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
      <a href="{{ route('front.password.request') }}">パスワードを忘れた方へ</a>
    </div>
    <div>
      <a href="{{ route('front.register') }}">新規登録</a>
    </div>
  </form>
@endsection