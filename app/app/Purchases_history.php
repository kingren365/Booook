<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Purchases_history extends Model
{
    protected $table = 'purchases_history';

    /**
     * Get the user that owns the Purchases_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user that owns the Purchases_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goods()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }

    public function insertPurchases($user_id, $goods_id, $name, $tel, $adnumber, $adress)
    {
        $this->user_id = $user_id;
        $this->goods_id = $goods_id;
        $this->history_date = Carbon::now();
        $this->purchase_name = $name;
        $this->tel = $tel;
        $this->adnumber = $adnumber;
        $this->adress = $adress;
        $this->save();
        return;
    }

    public function history($user_id)
    {
        return $this->with('user')->with('goods')->where('user_id', '=', $user_id)->get()->toArray();
    }

    public function allget()
    {
        return $this->with('user')->with('goods')->get()->toArray();
    }

    public function insertFromCart($name, $tel, $adnumber, $adress, $user_id)
    {
        $insertPurchase = [];
        foreach (session()->get('cartData') as $data) {
            $box = [];
            for ($i = 0; $i < $data['quantity']; $i++) {
                $purchase_name = $name;
                $goods_id = $data['goods_id'];
                $history_date = Carbon::now();
                $box = compact('user_id', 'goods_id', 'purchase_name', 'history_date', 'tel', 'adnumber', 'adress');
                array_push($insertPurchase, $box);
            }
        }
        $this->insert($insertPurchase);
        return;
    }
}
