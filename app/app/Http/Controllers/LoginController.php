<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }

    public function loginform()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $userinfo=$request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        if(Auth::attempt($userinfo)){
            $request->session()->put('user_id', $request->user()->id);
            $request->session()->put('name', $request->user()->name);
            $request->session()->put('email', $request->user()->email);
            return redirect()->route('user.home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        session()->forget('user_id');
        session()->forget('name');
        session()->forget('email');
        return redirect()->route('user.login.form');
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerComp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users',
            'tel' => 'required|max:12',
            'adnumber' => 'required|numeric',
            'adress' => 'required',
            'password'=>'required'
        ]);

        $this->users->insertUser($request->name,$request->email,$request->tel,$request->adnumber,$request->adress,$request->password);

        session()->flash('registerComp', '新規登録が完了しました。');

        return redirect()->route('user.login.form');
    }
}
