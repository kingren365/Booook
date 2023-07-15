<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $table = "adminusers";

    public function detailGet($user_id)
    {
        $user = $this->find($user_id)->toArray();
        return $user;
    }

    public function updateUser($user_id, $name, $email)
    {
        $user = $this->find($user_id);
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return;
    }
}
