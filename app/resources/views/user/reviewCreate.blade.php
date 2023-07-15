@extends('layout.user_layout')
@section('title')
-ユーザー-レビュー作成
@endsection
@section('section')
    <div class="p-3 d-flex justify-content-center my-3">
        <div style="width: 100%;">
            <h2 class="my-5" style="text-align: center;">
                ユーザーレビュー作成
            </h2>
            <div class="my-5 d-flex justify-content-around" style="width: 100%;">
                <div class="d-flex justify-content-center align-items-center p-3" style="width: 50%;"><img src="{{ asset('/storage/'.$goods['img_path']) }}" alt=""></div>
                <div class="d-flex justify-content-center align-items-center p-3" style="width: 50%;">
                    <div style="width: 100%;">
                        @if ($errors->any())
                            <div class="my-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.review.store') }}" method="POST" style="width: 100%;">
                            @csrf
                            <div class="text-primary" style="width: 100%;">
                                商品名
                            </div>
                            <div style="width: 100%;">
                                {{ $goods['title'] }}
                            </div>
                            <div class="text-primary" style="width: 100%;">
                                感想をどうぞ
                            </div>
                            <div style="width: 100%;">
                                <textarea name="content" rows="8" style="width: 100%;"></textarea>
                            </div>
                            <div>
                                <input type="hidden" name="goods_id" value="{{ $goods['id'] }}">
                                <button class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-1 text-center">
        <a href="{{ route('user.history') }}">
            <button class="btn btn-secondary">戻る</button>
        </a>
    </div>
@endsection



