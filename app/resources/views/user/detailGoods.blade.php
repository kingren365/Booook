@extends('layout.user_layout')
@section('title')
-商品詳細-
@endsection
@section('style')
@endsection
@section('section')
@if ($errors->any())
<div class="text-center my-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session()->has('createReviewMsg'))
    <p class="text-danger text-center my-3">{{ session('createReviewMsg') }}</p>
@endif
@if (session()->has('addCartMsg'))
    <p class="text-danger">{{ session('addCartMsg') }}</p>
@endif
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
        <div style="width: 70%;">
            <form style="display: inline;" method="POST" action="{{ route('user.cart.add') }}">
                @csrf
                <input type="hidden" name="goods_id" value="{{ $item['id'] }}">
                <input type="hidden" name="title" value="{{ $item['title'] }}">
                <input type="hidden" name="amount" value="{{ $item['amount'] }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-primary" style="width: 90%; margin-right: 10px;">
                    カートに入れる
                </button>
            </form>
        </div>
        <div style="width: 30%;"><a href="#purchaseArea"><button class="btn btn-danger" style="width: 90%; margin-left: 10px;" id="purchase">購入手続きへ</button></a></div>
    </div>
    <div class="text-center my-5"><a href="{{ route('user.home') }}"><button class="btn btn-secondary">戻る</button></a></div>

    <div id="review" style="width: 100%;" class="my-5">
        <h2 class="text-center">レビュー</h2>
            @empty($reviews)
                <p class="text-danger pb-3 text-center">まだコメントはありません</p>
            @else
                <table style="width: 100%;" class="table">
                    <tr>
                        <th class="col-3 p-2">名前</th>
                        <th class="col-9 p-2">コメント</th>
                    </tr>
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="py-3">{{ $review['user']['name'] }}</td>
                            <td class="py-3">{!! nl2br($review['content'])!!}</td>
                        </tr>
                    @endforeach
                </table>
            @endempty
    </div>

    <div class="purchaseArea my-5" id="purchaseArea">
        <h2 class="text-danger my-3 text-center">購入手続き</h2>
        <form action="{{ route('user.purchase') }}" method="POST">
            @csrf
            <div>
                <label class="text-primary" for="name">名前</label>
                <input type="text" name="name" style="width: 100%;" value="@if (session()->has('name')) {{ session('name') }} @endif">
            </div>
            <div>
                <label class="text-primary" for="tel">電話番号</label>
                <input type="text" name="tel" style="width: 100%;" value="@if (session()->has('tel')) {{ session('tel') }} @endif">
            </div>
            <div>
                <label class="text-primary" for="adnumber">郵便番号</label>
                <input type="text" name="adnumber" style="width: 100%;" value="@if (session()->has('adnumber')) {{ session('adnumber') }} @endif">
            </div>
            <div>
                <label class="text-primary" for="adress">住所</label>
                <input type="text" name="adress" style="width: 100%;" value="@if (session()->has('adress')) {{ session('adress') }} @endif">
            </div>
            <input type="hidden" name="user_id" value="@if (session()->has('user_id')) {{ session('user_id') }} @else 0 @endif">
            <input type="hidden" name="goods_id" value="{{ $item['id'] }}">
            <div class="my-3 text-center">
                <button type="submit" class="btn btn-danger">購入する</button>
            </div>
        </form>
    </div>
</div>
@endsection
