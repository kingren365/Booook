<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = "resetpasswords";

    public $timestamps = false;

    public function successSendMail($email)
    {
        $returnFlg = 0;
        $dbMails = $this->get()->toArray();
        foreach ($dbMails as $dbMail) {
            if ($dbMail['email'] == $email) {
                $returnFlg = 1;
            }
        }

        if ($returnFlg == 1) {
            return;
        } else {
            $this->email = $email;
            $this->save();
            return;
        }
    }

    public function checkEmail($email)
    {
        $returnFlg = false;
        $dbMails = $this->get()->toArray();
        foreach ($dbMails as $dbMail) {
            if ($dbMail['email'] == $email) {
                $returnFlg = true;
            }
        }
        return $returnFlg;
    }

    public function completeDelete($email)
    {
        $this->where('email', '=', $email)->delete();
        return;
    }
}
