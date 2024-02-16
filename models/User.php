<?php

namespace app\models;

use app\core\DbModel;


class User extends DbModel {

    public string $name;
    public string $lastName;
    public string $username;
    public string $password;
    public string $type;


    public function tableName(): string
    {
        return 'users';
    }

    public function rules():array{
        return [
            'name' => [self::RULE_REQUIRED],
            'lastName'=> [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED , self::RULE_EMAIL , [self::RULE_UNIQUE , 'class'=>self::class]],
            'password' => [self::RULE_REQUIRED , [self::RULE_MIN , 'min'=>8] , [self::RULE_MAX,'max' => 24 ]],
            'type'=>[self::RULE_REQUIRED]


        ];

    }

    public function save(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return parent::save();
    }

    public function attributes(): array
    {
        return ['name','lastName','username','password','type'] ;
    }
       
   public static function find($username ){

    $user = (new User)->findOne(['username'=>$username]);
    return $user;
   }
    
}