@extends('layout.user_layout')
@section('title')
-ユーザー-購入履歴
@endsection
@section('section')
    <div class="p-3 d-flex justify-content-center my-3">
        <div style="width: 100%;">
            <h2 class="my-5" style="text-align: center;">
                購入履歴
            </h2>
            @foreach ($histories as $history)
                <div class="d-flex justify-content-between p-3 my-3" style="width: 100%; border: 1px solid #000000;">
                    <div class="d-flex justify-content-center align-items-center">
                        {{ $history['goods']['title'] }}<span style="display: inline-block;margin-left:20px;" class="text-primary">{{ $history['goods']['amount'] }}</span>円
                    </div>
                    <div>
                        <a href="{{ route('user.review.create', ['id' => $history['goods_id']]) }}"><button class="btn btn-warning mx-2">レビューを書く</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



