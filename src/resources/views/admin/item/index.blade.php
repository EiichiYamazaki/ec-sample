@extends('admin.layouts.app')
@section('content')
  商品一覧
  <a href="{{ route('admin.item.create') }}">追加</a>
  <table>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>description</th>
      <th>price</th>
      <th>is_published</th>
      <th>edit</th>
    </tr>
    @foreach($items as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->is_published->label() }}</td>
        <td><a href="{{ route('admin.item.edit', $item->id) }}">編集</a></td>
      </tr>
    @endforeach
  </table>
@endsection