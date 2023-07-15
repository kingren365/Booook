<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function insertUser($name, $email, $tel, $adnumber, $adress, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->tel = $tel;
        $this->adnumber = $adnumber;
        $this->adress = $adress;
        $this->password = Hash::make($password);
        $this->save();
        return;
    }

    public function acntInfo($user_id)
    {
        $user = $this->find($user_id)->toArray();
        return $user;
    }

    public function updateUserInfo($user_id, $name, $email, $tel, $adnumber, $adress)
    {
        $user = $this->find($user_id);
        $user->name = $name;
        $user->email = $email;
        $user->tel = $tel;
        $user->adnumber = $adnumber;
        $user->adress = $adress;
        $user->save();
        return;
    }

    public function userAcntDelete($user_id)
    {
        $user = $this->find($user_id);
        $user->delete();
        return;
    }

    public function allget()
    {
        return $this->get()->toArray();
    }

    public function passwordReset($email, $password)
    {
        $this->where('email', '=', $email)->update(['password' => Hash::make($password)]);
        return;
    }

}
