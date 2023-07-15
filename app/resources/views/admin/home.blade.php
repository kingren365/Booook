@extends('layout.admin_layout')
@section('title')
-管理者ユーザーホーム-
@endsection
@section('style')
    a {
        display: block;
        width: 100%;
        margin: 40px auto;
        text-decoration: none;
    }
    button {
        display: block;
        width: 100%;
        padding: 40px;
        border-radius: 20px;
        font-weight: bold;
    }

    button:hover {
        color: #ffffff;
        background-color: #000000;
        transition: all ease .5s;
    }
@endsection
@section('section')
<h1 class="text-center my-5">管理者トップ</h1>
<a href="{{ route('admin.user.list') }}"><button>ユーザー管理</button></a>
<a href="{{ route('goods.index') }}"><button>商品管理</button></a>
<a href="{{ route('admin.manage.history') }}"><button>購入管理</button></a>
@endsection
