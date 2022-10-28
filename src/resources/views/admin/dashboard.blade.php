@extends('admin.layouts.app')

@section('content')
    <div class="container">
        ログインしました
    </div>
    <ul>
        <li>
            <a href="{{ route('admin.item.index') }}">商品一覧</a>
        </li>
    </ul>
@endsection
