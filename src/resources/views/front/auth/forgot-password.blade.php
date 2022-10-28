@extends('front.layouts.app')
@section('content')

    <form method="POST" action="{{ route('front.password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
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

            <div class="flex items-center justify-end mt-4">
                <button type="submit">パスワードリセット</button>
            </div>
        </form>
@endsection