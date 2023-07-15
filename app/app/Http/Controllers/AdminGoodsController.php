<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use Carbon\Carbon;

class AdminGoodsController extends Controller
{
    protected $goods;

    public function __construct()
    {
        $this->goods = new Good();
    }

    public function index()
    {
        $items = $this->goods->allgetAdmin();
        return view('admin.goodsAll', compact('items'));
    }

    public function create()
    {
        return view('admin.registerGoods');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'explain'=>'required',
            'price' => 'required|numeric',
            'image_path' => 'required',
        ]);
        $fileName = date("Y_m_d_H_i_s",strtotime(Carbon::now()))."_".$request->file('image_path')->getClientOriginalName();
        $this->goods->registerGoods($request->name, $request->explain, $request->price, $fileName);
        $request->file('image_path')->storeAs('public/', $fileName);
        session()->flash('registerGoodsComplete', '商品の登録が完了しました。');
        return redirect()->route('goods.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = $this->goods->detailGoods($id);
        return view('admin.editGoods', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'explain'=>'required',
            'price' => 'required|numeric',
        ]);
        if ($request->file('image_path') != NULL) {
            $fileName = date("Y_m_d_H_i_s",strtotime(Carbon::now()))."_".$request->file('image_path')->getClientOriginalName();
            $this->goods->updateGoods($id, $request->name, $request->explain, $request->price, $fileName);
            $request->file('image_path')->storeAs('public/', $fileName);
        } else {
            $this->goods->updateGoods($id, $request->name, $request->explain, $request->price, NULL);
        }
        session()->flash('editGoodsComplete', '商品の編集が完了しました。');
        return redirect()->route('goods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->goods->deleteGoods($id);
        session()->flash('delGoods', '商品の削除が完了しました。');
        return redirect()->route('goods.index');
    }
}
