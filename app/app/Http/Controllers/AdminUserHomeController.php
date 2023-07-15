<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use App\User;

class AdminUserHomeController extends Controller
{
    protected $adminUsers;
    protected $users;

    public function __construct()
    {
        $this->adminUsers = new AdminUser();
        $this->users = new User();
    }

    public function home()
    {
        return view('admin.home');
    }

    public function detailAcnt()
    {
        $user = $this->adminUsers->detailGet(session('admin_user_id'));
        return view('admin.account', compact('user'));
    }

    public function editAcnt(Request $request)
    {
        $user = $this->adminUsers->detailGet($request->id);
        return view('admin.accountEdit', compact('user'));
    }

    public function updateAcnt(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:adminusers,email,' . $request->user_id . ',id',
        ]);
        $this->adminUsers->updateUser($request->user_id, $request->name, $request->email);
        session()->forget('admin_name');
        session()->forget('admin_email');
        session()->put('admin_name', $request->name);
        session()->put('admin_email', $request->email);
        session()->flash('adminUserAcntUpdate', 'アカウント情報の更新が完了しました。');
        return redirect()->route('admin.account');
    }

    public function userList()
    {
        $users = $this->users->allget();
        return view('admin.userlist', compact('users'));
    }

    public function userEdit(Request $request)
    {
        $user = $this->users->acntInfo($request->id);
        return view('admin.useredit', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email,' . $request->id . ',id',
            'tel' => 'required|max:12',
            'adnumber' => 'required|numeric',
            'adress' => 'required',
        ]);

        $this->users->updateUserInfo($request->id, $request->name, $request->email, $request->tel, $request->adnumber, $request->adress);
        session()->flash('editComplete', '一般ユーザー情報の編集が完了しました。');
        return redirect()->route('admin.user.edit', ['id' => $request->id]);
    }

    public function userDelete(Request $request)
    {
        $this->users->userAcntDelete($request->id);
        session()->flash('userDelMsg', '一般ユーザーの削除が完了しました。');
        return redirect()->route('admin.user.list');
    }

}
