<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;

class UserHomeController extends Controller
{
    protected $goods;

    public function __construct()
    {
        $this->goods = new Good();
    }

    public function home()
    {
        $items = $this->goods->allget();
        return view('user.home', compact('items'));
    }

    public function detailGoods(Request $request)
    {
        $item = $this->goods->detailGoods($request->id);
        return view('user.detailGoods', compact('item'));
    }
}
