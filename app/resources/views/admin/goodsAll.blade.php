@extends('layout.admin_layout')
@section('title')
-管理者商品一覧-
@endsection
@section('section')
<div class="p-3 text-center">
    <h2 class="my-5">
        管理者商品一覧
    </h2>
    @if (session()->has('delGoods'))
        <p class="text-danger my-5">{{ session('delGoods') }}</p>
    @endif
    @if (session()->has('registerGoodsComplete'))
        <p class="text-danger my-5">{{ session('registerGoodsComplete') }}</p>
    @endif
    @if (session()->has('editGoodsComplete'))
        <p class="text-danger">{{ session('editGoodsComplete') }}</p>
    @endif
    @foreach ($items as $item)
        <div class="p-3 col-12 my-3 mx-1" style="border: 1px solid #000000;">
            <div class="d-flex justify-content-between">
                <div>
                    {{ $item['title'] }}
                </div>
                <div>
                    <a href="{{ route('goods.edit', ['good' => $item['id']]) }}"><button class="btn btn-warning mx-2">編集</button></a>
                    <a class="goodsDelBtn">
                        <button class="btn btn-danger mx-2">削除</button>
                        <form action="{{ route('goods.destroy', ['good' => $item['id']]) }}" method="POST" style="display: hidden;" class="goodsDelForm">
                            @csrf
                            @method('DELETE')
                        </form>    
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="my-5 text-center">
    <a href="{{ route('goods.create') }}"><button class="btn btn-primary">商品登録</button></a>
</div>
<div class="my-3 text-center">
    <a href="{{ route('admin.home') }}"><button class="btn btn-secoundary">戻る</button></a>
</div>
@endsection

@section('js')
    $(function(){
        $('.goodsDelBtn').click(function(e){
            e.preventDefault();
            if (confirm('本当にこの商品を削除しますか？')) {
                $(this).children('.goodsDelForm').submit();
            } else {
                return false;
            }
        });
    });
@endsection