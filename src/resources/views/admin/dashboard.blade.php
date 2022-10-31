@extends('admin.layouts.app')

@section('content')
    <div class="container">
        ログインしました
    </div>
    <div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                ログアウト
            </button>
        </form>
    </div>
    <ul>
        <li>
            <a href="{{ route('admin.item.index') }}">商品一覧</a>
        </li>
    </ul>
@endsection
