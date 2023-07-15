@extends('layout.user_layout')
@section('title')
    -ショッピングカート-
@endsection
@section('section')
    <h2 class="my-5 text-center">ショッピングカート</h2>
    @if (session()->has('cartData') && !empty(session('cartData')))
        @if (session('cartDataDelete'))
            <p class="text-danger text-center my-5">{{ session('cartDataDelete') }}</p>
        @endif
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col" class="col-5">商品名</th>
                    <th scope="col" class="col-3">値段</th>
                    <th scope="col" class="col-2">数量</th>
                    <th scope="col" class="col-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cartData') as $key => $data)
                    <tr>
                        <th scope="row" class="col-5 align-middle">{{ $data['title'] }}</th>
                        <td class="col-3 align-middle">{{ $data['amount'] }}</td>
                        <td class="col-2 align-middle">{{ $data['quantity'] }}</td>
                        <td class="col-2 align-middle"><a href="{{ route('user.cart.delete', ['id' => $data['goods_id']]) }}"><button type="button" class="btn btn-danger">削除</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @if (session()->has('cartPurchaseComplete'))
            <p class="text-danger text-center my-5">{{ session('cartPurchaseComplete') }}</p>
        @endif
        <p class="text-danger text-center my-5">カートには何も入っていません。</p>
    @endif

    @if (session()->has('cartData') && !empty(session('cartData')))
        <div class="my-3 text-center">
            <a href="#purchaseArea"><button class="btn btn-danger">購入手続きへ</button></a>
        </div>
    @endif
    <div class="my-3 text-center">
        <a href="{{ route('user.home') }}"><button class="btn btn-primary">トップへ戻る</button></a>
    </div>

    @if (session()->has('cartData') && !empty(session('cartData')))
        <div class="purchaseArea my-5" id="purchaseArea">
            <h2 class="text-danger my-3 text-center">購入手続き</h2>
            <form action="{{ route('user.cart.purchase') }}" method="POST">
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
                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-danger">購入する</button>
                </div>
            </form>
        </div>
    @endif
@endsection
