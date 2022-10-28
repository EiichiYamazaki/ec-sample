@extends('admin.layouts.app')
@section('content')
  商品登録
  <form method="POST" action="{{ route('admin.item.store') }}">
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

    <div class="mt-4">
      <label>
        description
      </label>
      <textarea name="description">{{ old('description') }}</textarea>
      @if ($errors->has('description'))
        <ul>
          @foreach ((array) $errors->get('description') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <div class="mt-4">
      <label>
        price
      </label>
      <input type="number" name="price" value="{{ old('price') }}" required>
      @if ($errors->has('price'))
        <ul>
          @foreach ((array) $errors->get('price') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <div class="mt-4">
      <label>
        is_published
      </label>
      <select name="is_published">
        <option value="">選択してね</option>
        @foreach($isPublishedList as $isPublished)
          <option value="{{ $isPublished->value }}"
                  @if (old('is_published') == $isPublished->value) selected="selected" @endif>{{ $isPublished->label() }}</option>
        @endforeach
      </select>
      @if ($errors->has('is_published'))
        <ul>
          @foreach ((array) $errors->get('is_published') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      @endif
    </div>

    <div class="mt-4">
      <label>
        category
      </label>
      @foreach($categories as $category)
        <input type="checkbox" name="category[]" value="{{ $category->id }}" id="category_{{ $category->id }}" @if (!empty(old('category')) && old('category') == $category->id) checked="checked" @endif>
        <label for="category_{{ $category->id }}">{{ $category->name }}</label>
      @endforeach
      @if ($errors->has('category'))
        <ul>
          @foreach ((array) $errors->get('category') as $message)
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