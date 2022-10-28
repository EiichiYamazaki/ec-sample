@extends('admin.layouts.app')
@section('content')
  <form method="POST" action="{{ route('admin.password.update') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div>
      <label>email</label>
      <input type="email" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <ul>
          @foreach ((array) $errors->get('email') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <!-- Password -->
    <div class="mt-4">
      <label>
        password
      </label>
      <input type="password" name="password" value="" required>
      @if ($errors->has('password'))
        <ul>
          @foreach ((array) $errors->get('password') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <label>
        password_confirmation
      </label>
      <input type="password" name="password_confirmation" value="" required>
      @if ($errors->has('password_confirmation'))
        <ul>
          @foreach ((array) $errors->get('password_confirmation') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <div class="flex items-center justify-end mt-4">
      <button type="submit">パスワードリセット</button>
    </div>
  </form>
@endsection