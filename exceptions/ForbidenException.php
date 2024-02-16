<?php

namespace app\exceptions;

use app\core\FrameworkException;

class ForbidenException extends FrameworkException{
    public function __construct() {
        parent::__construct(['message'=>'forbidden']);
    }

    public function handle()
    {
        self::$response->json($this->data,self::$response::FORBIDEN);
    }
}