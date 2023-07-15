<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = "goods";

    public function allget($search_word, $price_min, $price_max)
    {
        if ($price_max < $price_min) {
            $goods = $this->where('display_flg', '=', '0')->get()->toArray();
        } elseif ($search_word == null) {
            $goods = $this->where('display_flg', '=', '0')->whereBetween('amount', [$price_min, $price_max])->get()->toArray();
        } else {
            $goods = $this->where('display_flg', '=', '0')
            ->where(function($q) use($search_word) {
                $q->where('title', 'LIKE', '%'. $search_word .'%')
                ->orWhere('explain', 'LIKE', '%'. $search_word . '%');
            })
            ->whereBetween('amount', [$price_min, $price_max])->get()->toArray();
        }
        return $goods;
    }

    public function allgetAdmin()
    {
        return $this->where('display_flg', '=', '0')->get()->toArray();
    }

    public function detailGoods($id)
    {
        $goods = $this->find($id)->toArray();
        return $goods;
    }

    public function deleteGoods($id)
    {
        $goods = $this->find($id);
        $goods->display_flg = 1;
        $goods->save();
        return;
    }

    public function registerGoods($title, $explain, $amount, $img_path)
    {
        $this->title = $title;
        $this->explain = $explain;
        $this->amount = $amount;
        $this->display_flg = 0;
        $this->img_path = $img_path;
        $this->save();
        return;
    }

    public function updateGoods($goods_id, $title, $explain, $amount, $img_path)
    {
        $goods = $this->find($goods_id);
        if ($img_path == NULL) {
            $goods->title = $title;
            $goods->explain = $explain;
            $goods->amount = $amount;
            $goods->save();
        } else {
            $goods->title = $title;
            $goods->explain = $explain;
            $goods->amount = $amount;
            $goods->img_path = $img_path;
            $goods->save();
        }
        return;
    }
}
