@extends('admin.layouts.app')
@section('content')
  <form method="POST" action="{{ route('admin.register') }}">
    @csrf
    <div>
      <label>
        name
      </label>
      <input type="text" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
        <ul>
          @foreach ((array) $errors->get('name') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <label>
        email
      </label>
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
      <button type="submit">登録</button>
    </div>
  </form>
@endsection