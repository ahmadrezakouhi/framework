<?php
namespace app\core;

class Response {
   public const OK = 200;
   public const CREATE = 201;
   public const UPDATE = 202;
   public const NO_CONTENT = 204;
   public const UNPROCESSABLE = 422;
   public const UNAUTH = 401;
   public const FORBIDEN = 403;

    public function __construct()
    {
       
    }

    public function setStatusCode(int $code){
        http_response_code($code);

    }

    public function json($data , $status){
        
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $this->setStatusCode($status);
        return json_encode($data);
    }
}