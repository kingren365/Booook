<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = "goods";

    public function allget()
    {
        $goods = $this->where('display_flg', '=', '0')->get()->toArray();
        return $goods;
    }

    public function detailGoods($id)
    {
        $goods = $this->find($id)->toArray();
        return $goods;
    }
}
