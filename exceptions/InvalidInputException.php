<?php

namespace app\exceptions;

use app\core\Application;
use app\core\FrameworkException;
use app\core\Response;

class InvalidInputException extends FrameworkException{

    public function __construct($data)
    {
        parent::__construct( $data);
    }

    public function handle()
    {
        return self::$response->json($this->data,self::$response::UNPROCESSABLE);
    }

}