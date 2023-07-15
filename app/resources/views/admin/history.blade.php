@extends('layout.admin_layout')
@section('title')
    -管理者購入履歴-
@endsection
@section('section')
    <div class="p-3 text-center">
        <h2 class="my-5">
            購入履歴一覧
        </h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">区分</th>
                    <th scope="col">購入者</th>
                    <th scope="col">商品名</th>
                    <th scope="col">住所</th>
                    <th scope="col">購入日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>
                            @if ($history['user_id'] == 0)
                            <span class="text-danger">未登録者</span>
                        @else
                            <span class="text-primary">登録者</span>
                        @endif
                        </td>
                        <td>
                            {{ $history['purchase_name'] }}
                        </td>
                        <td>
                            {{ $history['goods']['title'] }}
                        </td>
                        <td>
                            {{ $history['adress'] }}
                        </td>
                        <td>
                            {{ date("Y/m/d", strtotime($history['history_date'])) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
