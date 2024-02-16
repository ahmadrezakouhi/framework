<?php

namespace app\models;

use app\core\Model;

class LoginForm extends Model
{
    public string $username;
    public string $password;
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function login()
    {

        $user  =  User::find($this->username);
        if (!$user || !password_verify($this->password, $user?->password)) {
            $this->addError('message', 'کاربری با این مشخصات  موجود نمی باشد');
            return false;
        }
        return true;
    }
}
