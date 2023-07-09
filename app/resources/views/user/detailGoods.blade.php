@extends('layout.user_layout')
@section('title')
-商品詳細-
@endsection
@section('style')
@endsection
@section('section')
<div style="display: block; width: 100%; margin: 0 auto; padding: 40px;">
    <div class="text-center">
        <img src="{{ asset('/storage/'.$item['img_path']) }}" alt="">
    </div>
    <div style="width: 50%; margin: 20px auto;">
        <div class="text-primary text-left">商品名</div>
        <div>{{ $item['title'] }}</div>
    </div>
    <div style="width: 50%; margin: 20px auto;">
        <div class="text-primary text-left">金額</div>
        <div>{{ $item['amount'] }}円</div>
    </div>
    <div style="width: 50%; margin: 20px auto;">
        <div class="text-primary text-left">商品詳細</div>
        <div>{{ $item['explain'] }}</div>
    </div>
    <div style="width: 50%; margin: 20px auto;" class="d-flex justify-content-around">
        <div style="width: 70%;"><a href=""><button class="btn btn-primary" style="width: 90%; margin-right: 10px;">カートに入れる</button></a></div>
        <div style="width: 30%;"><a href=""><button class="btn btn-danger" style="width: 90%; margin-left: 10px;">購入</button></a></div>        
    </div>
</div>
@endsection
