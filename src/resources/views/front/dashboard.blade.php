@extends('front.layouts.app')

@section('content')
    <div class="container">
        ログインしました
    </div>
    <div>
        <form method="POST" action="{{ route('front.logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                ログアウト
            </button>
        </form>
    </div>
@endsection
