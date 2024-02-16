<?php

namespace app\core;

use Exception;

abstract class FrameworkException extends Exception{
    public array $data;
    public static Response $response ;
    public function __construct($data)
    {  
        $this->data = $data;
        self::$response = Application::$app->response;
        
    }
    abstract function handle();
}