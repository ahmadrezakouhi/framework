<?php
namespace app\exceptions;

use app\core\FrameworkException;

class NotFoundException extends FrameworkException{
    public function __construct()
    {
        parent::__construct(['message'=>'not found']);
    }
    public function handle()
    {
        return self::$response->json($this->data,self::$response::UNPROCESSABLE);
    }
}