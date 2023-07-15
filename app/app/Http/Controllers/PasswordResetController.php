<?php

namespace App\Http\Controllers;

use App\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    protected $resetPassword;
    protected $users;
    public function __construct()
    {
        $this->resetPassword = new ResetPassword();
        $this->users = new User();
    }
    public function beforeSend()
    {
        return view('passwordreset.beforeSend');
    }

    public function SendMail(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);
        $email = $request->email;
        $url = route('user.password.reset.confirm')."?email=".$email;
        $this->resetPassword->successSendMail($email);
        Mail::send('mail.url', [
            'url' => $url,
        ], function ($message) use ($email) {
            $message->to($email)
                ->subject('パスワード変更用URLのお知らせ');
        });
        session()->flash('confirmMailMsg', 'メールの送信が完了しました。');
        return redirect()->route('user.password.reset.before');
    }

    public function confirmPassword(Request $request)
    {
        $checkEmail = $this->resetPassword->checkEmail($request->email);

        if ($checkEmail) {
            $email = $request->email;
            return view('passwordreset.confirmpassword', compact('email'));
        } else {
            return redirect()->route('user.login.form');
        }
    }

    public function completePassword(Request $request)
    {
        $request->validate([
            'password'=>'required|confirmed',
        ]);
        $this->users->passwordReset($request->email, $request->password);
        $this->resetPassword->completeDelete($request->email);
        session()->flash('completeMailMsg', 'パスワードの再設定が完了しました。');
        return redirect()->route('user.login.form');
    }
}
