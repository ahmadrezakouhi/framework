<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{

    protected array $middlewares = [];
    public string $action = '';

    public function returnJson($data, $status)
    {

        return Application::$app->response->json($data, $status);
    }

    public function registerMiddleware(BaseMiddleware $baseMiddleware)
    {

        $this->middlewares[] = $baseMiddleware;
    }

    public function getMiddlewares(){
        return $this->middlewares;
    }
}
