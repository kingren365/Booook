<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function goods()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }

    public function createReview($user_id, $goods_id, $content)
    {
        $this->user_id = $user_id;
        $this->goods_id = $goods_id;
        $this->content = $content;
        $this->save();
        return;
    }

    public function getReview($goods_id)
    {
        return $this->with('user')->with('goods')->where('goods_id', '=', $goods_id)->get()->toArray();
    }
}
