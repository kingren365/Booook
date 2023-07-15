@extends('layout.admin_layout')
@section('title')
管理者一般ユーザーユーザー編集
@endsection
@section('section')
    @isset ($user)
    <div class="p-3 d-flex justify-content-center my-3">
        <div>
            <h2 class="my-3">
                管理者一般ユーザーユーザー編集
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
            @if (session()->has('editComplete'))
                <p class="text-danger">{{ session('editComplete') }}</p>
            @endif
            <form action="{{ route('admin.user.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <div>
                    <label class="text-primary" for="email">ユーザー名(メールアドレス)</label>
                    <div><input type="text" name="email" value="{{ $user['email'] }}" style="width: 100%;"></div>
                </div>
                <div>
                    <label class="text-primary" for="name">名前</label>
                    <div><input type="text" name="name" value="{{ $user['name'] }}" style="width: 100%;"></div>
                </div>
                <div>
                    <label class="text-primary" for="tel">電話番号</label>
                    <div><input type="text" name="tel" value="{{ $user['tel'] }}" style="width: 100%;"></div>
                </div>
                <div>
                    <label class="text-primary" for="adnumber">郵便番号</label>
                    <div><input type="text" name="adnumber" value="{{ $user['adnumber'] }}" style="width: 100%;"></div>
                </div>
                <div class="mb-5">
                    <label class="text-primary" for="adress">住所</label>
                    <div><input type="text" name="adress" value="{{ $user['adress'] }}" style="width: 100%;"></div>
                </div>
                <div class="my-3 text-center">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
                <div class="my-3 text-center">
                    <a href="{{ route('admin.user.delete', ['id' => $user['id']]) }}" onclick="return confirm('本当に削除しますか？');"><button type="button" class="btn btn-danger">削除</button></a>
                </div>
                <div class="my-3 text-center">
                    <a href="{{ route('admin.user.list') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
                </div>
            </form>
        </div>
    </div>
    @endisset
@endsection
