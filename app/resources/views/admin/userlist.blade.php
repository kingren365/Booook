@extends('layout.admin_layout')
@section('title')
    -管理者一般ユーザー一覧-
@endsection
@section('section')
    <div class="p-3 text-center">
        <h2 class="my-5">
            管理者一般ユーザー一覧
        </h2>
        @if (session()->has('userDelMsg'))
            <p class="text-danger">{{ session('userDelMsg') }}</p>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">電話番号</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user['id'] }}
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', ['id' => $user['id']]) }}">
                                {{ $user['name'] }}
                            </a>
                        </td>
                        <td>
                            {{ $user['email'] }}
                        </td>
                        <td>
                            {{ $user['tel'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
