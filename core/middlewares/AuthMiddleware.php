<?php
namespace app\core\middlewares;

use app\core\Application;
use app\exceptions\ForbidenException;

class AuthMiddleware extends BaseMiddleware{

    public array $actions = [];

    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(empty($this->actions) || in_array(Application::$app->controller->action , $this->actions)){
            throw new ForbidenException();
        }
    }

}