@extends('admin.layouts.app')
@section('content')
  <form method="POST" action="{{ route('admin.password.confirm') }}">
    @csrf

    <!-- Password -->
    <div>
      <label>
        Password
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

    <div class="flex justify-end mt-4">
      <button type="submit">確認</button>
    </div>
  </form>
@endsection
