<?php
namespace app\exceptions;

use app\core\FrameworkException;

class Handler {
    public function handle(FrameworkException $e){
        
            return $e->handle();
        
    }
}