@extends('layout.user_layout')
@section('title')
-ユーザーホーム-
@endsection
@section('section')
<div class="d-flex justify-content-center p-3 flex-wrap text-center">
    @foreach ($items as $item)
        <div class="p-3 col-3 my-3 mx-1" style="border: 1px solid #000000;">
            <div><img src="{{ asset('/storage/'.$item['img_path']) }}" alt="" style="width: 100%"></div>
            <div><a href="{{ route('user.goods.detail', ['id' => $item['id']]) }}">{{ $item['title'] }}</a></div>
        </div>
    @endforeach
</div>

<div class="my-3 text-center">
    <a href="">特商法部に基づく表記</a>
</div>
@endsection
