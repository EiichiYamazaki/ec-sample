@extends('admin.layouts.app')
@section('content')
  <div class="mt-4 flex items-center justify-between">
    <form method="POST" action="{{ route('admin.verification.send') }}">
      @csrf

      <div>
        <button type="submit">Resend Verification Email</button>
      </div>
    </form>

    <form method="POST" action="{{ route('admin,logout') }}">
      @csrf

      <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
        ログアウト
      </button>
    </form>
  </div>
@endsection