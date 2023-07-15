@extends('layout.admin_layout')
@section('title')
-管理者商品登録-
@endsection
@section('section')
<div class="p-3 text-center">
    <h2 class="my-5">
        管理者商品登録
    </h2>
</div>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('goods.store') }}" method="POST" style="width: 100%;" enctype="multipart/form-data">
    @csrf
    <div class="my-4">
        <label class="text-primary" for="name">商品名</label>
        <input type="text" name="name" style="width: 100%;" value="{{ old('name') }}">
    </div>
    <div class="my-4">
        <label class="text-primary" for="explain">商品説明</label>
        <textarea name="explain" id="explain" style="width: 100%;" rows="6">{{ old('explain') }}</textarea>
    </div>
    <div class="my-4">
        <label class="text-primary" for="price">金額</label>
        <input type="text" name="price" id="price" style="width: 100%;" value="{{ old('price') }}">
    </div>
    <div class="my-4">
        <label class="text-primary" for="image_path">画像</label>
        <input type="file" name="image_path" id="image_path" style="width: 100%;" value="{{ old('image_path') }}">
    </div>
    <div class="my-3 text-center">
        <button type="submit" class="btn btn-primary">登録する</button>
    </div>
</form>

<div class="my-3 text-center">
    <a href="{{ route('goods.index') }}"><button class="btn btn-secoundary">戻る</button></a>
</div>
@endsection