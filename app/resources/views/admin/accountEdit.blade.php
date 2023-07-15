@extends('layout.admin_layout')
@section('title')
-管理者ユーザー-アカウント情報編集
@endsection
@section('section')
    @isset ($user)
    <div class="p-3 d-flex justify-content-center my-3">
        <div>
            <h2 class="my-3">
                管理者アカウント情報編集
            </h2>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.account.update') }}" method="POST">
                @csrf
                <div>
                    <label class="text-primary" for="email">ユーザー名(メールアドレス)</label>
                    <div><input type="text" name="email" value="{{ $user['email'] }}" style="width: 100%;"></div>
                </div>
                <div>
                    <label class="text-primary" for="name">名前</label>
                    <div><input type="text" name="name" value="{{ $user['name'] }}" style="width: 100%;"></div>
                </div>
                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                <div class="my-3 text-center">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
                <div class="my-3 text-center">
                    <a href="{{ route('admin.account') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
                </div>
            </form>
        </div>
    </div>
    @endisset
@endsection
