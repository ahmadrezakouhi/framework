<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;

use app\exceptions\InvalidInputException;
use app\models\LoginForm;
use app\models\User;


class AuthController extends Controller
{
    public function __construct()
    {
       $this->registerMiddleware(new AuthMiddleware(['profile'])) ;
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        $loginForm->loadData($request->getBody());
        if($loginForm->validate() && $loginForm->login()){
            $this->returnJson(['message'=>'ok'],200);
            
        }else{
            throw new InvalidInputException($loginForm->errors);
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->loadData($request->getBody());


        if ($user->validate() && $user->save()) {
        } else {

            throw new InvalidInputException($user->errors);
        }
    }
}
