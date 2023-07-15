@extends('layout.user_layout')
@section('title')
-ユーザー-アカウント情報
@endsection
@section('section')
    @isset ($user)
    <div class="p-3 d-flex justify-content-center my-3">
        <div>
            <h2 class="my-3">
                アカウント情報
            </h2>
            @if (session()->has('userAcntUpdate'))
                <p class="text-danger">{{ session('userAcntUpdate') }}</p>
            @endif
            <div>
                <label class="text-primary" for="email">ユーザー名(メールアドレス)</label>
                <div>{{ $user['email'] }}</div>
            </div>
            <div>
                <label class="text-primary" for="email">名前</label>
                <div>{{ $user['name'] }}</div>
            </div>
            <div>
                <label class="text-primary" for="tel">電話番号</label>
                <div>{{ $user['tel'] }}</div>
            </div>
            <div>
                <label class="text-primary" for="adnumber">郵便番号</label>
                <div>{{ $user['adnumber'] }}</div>
            </div>
            <div class="mb-5">
                <label class="text-primary" for="adress">住所</label>
                <div>{{ $user['adress'] }}</div>
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('user.account.edit') }}"><button class="btn btn-primary">編集</button></a>
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('user.account.delete', ['id' => $user['id']]) }}"><button class="btn btn-danger" onclick="return confirm('本当に退会しますか？');">退会</button></a>
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('user.home') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
            </div>
        </div>
    </div>
    @endisset
@endsection
