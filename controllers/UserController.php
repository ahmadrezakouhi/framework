<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\exceptions\InvalidInputException;
use app\models\User;

class UserController extends Controller{
    public function index(){

    }

    public function store(Request $request){
        $user = new User();
        $user->loadData($request->getBody());
        if($user->validate() && $user->save()){
            
           return $this->returnJson(['message'=>'success'],200);
        }else{
            throw new InvalidInputException($user->errors);
        }
        
    }

    public function update(Request $request){

    }
}