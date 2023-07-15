<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\User;
use App\Purchases_history;
use App\Review;
use Illuminate\Validation\Rule;

class UserHomeController extends Controller
{

    protected $goods;
    protected $users;
    protected $purchases;
    protected $reviews;

    public function __construct()
    {
        $this->goods = new Good();
        $this->users = new User();
        $this->purchases = new Purchases_history();
        $this->reviews = new Review();
    }

    public function home(Request $request)
    {
        !isset($request->search_word) ? $searchWord = "" : $searchWord = $request->search_word;
        !isset($request->price_min) ? $priceMin = 0 : $priceMin = $request->price_min;
        !isset($request->price_max) ? $priceMax = 100000 : $priceMax = $request->price_max;
        $priceMax < $priceMin ? $priceMin = 0 : "";
        $items = $this->goods->allget($searchWord, $priceMin, $priceMax);
        return view('user.home', compact('items', 'searchWord', 'priceMin', 'priceMax'));
    }

    public function detailGoods(Request $request)
    {
        $searchWord = "";
        $priceMin = 0;
        $priceMax = 100000;
        $item = $this->goods->detailGoods($request->id);
        $reviews = $this->reviews->getReview($request->id);
        return view('user.detailGoods', compact('item', 'searchWord', 'priceMin', 'priceMax', 'reviews'));
    }

    public function userAcnt()
    {
        if (session()->has('user_id')) {
            $user = $this->users->acntInfo(session('user_id'));
            return view('user.account', compact('user'));
        }
        return view('user.account');
    }

    public function userAcntEdit()
    {
        if (session()->has('user_id')) {
            $user = $this->users->acntInfo(session('user_id'));
            return view('user.accountEdit', compact('user'));
        }
        return view('user.accountEdit');
    }

    public function userAcntUpdate(Request $request)
    {
        if (session()->has('user_id')) {
            $request->validate([
                'name' => 'required',
                'email'=>'required|email|unique:users,email,' . session('user_id') . ',id',
                'tel' => 'required|max:12',
                'adnumber' => 'required|numeric',
                'adress' => 'required',
            ]);
            $this->users->updateUserInfo(session('user_id'),$request->name,$request->email,$request->tel,$request->adnumber,$request->adress);
            session()->forget('name');
            session()->forget('email');
            session()->forget('tel');
            session()->forget('adnumber');
            session()->forget('adress');
            session()->put('name', $request->name);
            session()->put('email', $request->email);
            session()->put('tel', $request->tel);
            session()->put('adnumber', $request->adnumber);
            session()->put('adress', $request->adress);
            session()->flash('userAcntUpdate', 'ユーザー情報の更新が完了しました。');
            return redirect()->route('user.account');
        }
        return redirect()->route('user.account');
    }

    public function userAcntDelete(Request $request)
    {
        $this->users->userAcntDelete($request->id);
        session()->forget('user_id');
        session()->forget('name');
        session()->forget('email');
        session()->flash('userAcntDelete', '退会手続きが完了しました。');
        return redirect()->route('user.login.form');
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required|max:12',
            'adnumber' => 'required|numeric',
            'adress' => 'required',
        ]);

        $this->purchases->insertPurchases($request->user_id,$request->goods_id, $request->name, $request->tel, $request->adnumber, $request->adress);

        session()->flash('purchaseComplete', '購入が完了しました。');

        return redirect()->route('user.home');
    }

    public function specialCommercialLaw()
    {
        return view('user.specialCommercialLaw');
    }

    public function history(Request $request)
    {
        $histories = $this->purchases->history(session('user_id'));
        return view('user.history', compact('histories'));
    }

    public function reviewCreate(Request $request)
    {
        $goods = $this->goods->detailGoods($request->id);
        return view('user.reviewCreate', compact('goods'));
    }

    public function reviewStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $this->reviews->createReview(session('user_id'), $request->goods_id, $request->content);
        session()->flash('createReviewMsg', 'レビューの書き込みが完了しました。');
        return redirect()->route('user.goods.detail', ['id' => $request->goods_id]);
    }

    public function addCart(Request $request)
    {
        $goods_id = $request->goods_id;
        $title = $request->title;
        $amount = $request->amount;
        $quantity = intval($request->quantity);
        $newCartData = [];
        $newCartData = compact('goods_id', 'title', 'amount', 'quantity');
        $breakFlg = 0;
        if (session()->has('cartData')) {
            foreach ($request->session()->get('cartData') as $key => $data) {
                if ($request->session()->get('cartData.'.$key.'.goods_id') == $goods_id) {
                    $request->session()->put('cartData.'.$key.'.quantity', $request->session()->get('cartData.'.$key.'.quantity') + 1);
                    $breakFlg = 1;
                    break;
                }
            }
            $breakFlg == 0 ? $request->session()->push('cartData', $newCartData) : "";
        } else {
            $request->session()->put('cartData', array());
            $request->session()->push('cartData', $newCartData);
        }
        $request->session()->flash('addCartMsg', 'カートに追加しました。');
        return redirect()->route('user.goods.detail', ['id' => $goods_id]);
    }

    public function viewCart()
    {
        return view('user.shoppingCart');
    }

    public function deleteCart(Request $request)
    {
        foreach ($request->session()->get('cartData') as $key => $data) {
            if ($request->session()->get('cartData.'.$key.'.goods_id') == $request->id) {
                session()->forget('cartData.'.$key);
            }
        }
        $request->session()->flash('cartDataDelete', '商品を削除しました。');
        return redirect()->route('user.cart.view');
    }

    public function purchaseCart(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tel' => 'required|max:12',
            'adnumber' => 'required|numeric',
            'adress' => 'required',
        ]);
        $name = $request->name;
        $tel = $request->tel;
        $adnumber = $request->adnumber;
        $adress = $request->adress;
        $user_id = $request->user_id;
        $this->purchases->insertFromCart($name, $tel, $adnumber, $adress, $user_id);
        session()->forget('cartData');
        session()->flash('cartPurchaseComplete', '購入が完了しました。');
        return redirect()->route('user.cart.view');
    }

}
