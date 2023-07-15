@extends('layout.admin_layout')
@section('title')
-管理者ユーザー-アカウント情報
@endsection
@section('section')
    @isset ($user)
    <div class="p-3 d-flex justify-content-center my-3">
        <div>
            <h2 class="my-3">
                管理者アカウント情報
            </h2>
            @if (session()->has('adminUserAcntUpdate'))
                <p class="text-danger">{{ session('adminUserAcntUpdate') }}</p>
            @endif
            <div>
                <label class="text-primary" for="email">ユーザー名(メールアドレス)</label>
                <div>{{ $user['email'] }}</div>
            </div>
            <div>
                <label class="text-primary" for="email">名前</label>
                <div>{{ $user['name'] }}</div>
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('admin.account.edit',['id' => $user['id']]) }}"><button class="btn btn-primary">編集</button></a>
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('admin.home') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
            </div>
        </div>
    </div>
    @endisset
@endsection
