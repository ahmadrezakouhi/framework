<?php

namespace app\core;

use app\exceptions\FrameworkException;
use app\exceptions\Handler;
use app\exceptions\NotFoundException;
use Exception;

class Router
{

    protected array $routes = [];
    public Handler $handler;
    public Request $request;
    public Response $response;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->handler = new Handler();
    }

    private function addRoute($method,$path,$callback){

        $this->routes[$method][$path] = $callback;
    }

    public function get($path, $callback)
    {
        $this->addRoute('get',$path,$callback);
    }


    public function post($path, $callback)
    {
        $this->addRoute('post',$path,$callback);
    }


    public function put($path, $callback)
    {
        $this->addRoute('put',$path,$callback);
    }


    public function delete($path, $callback)
    {
        $this->addRoute('delete',$path,$callback);
    }



    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            throw new NotFoundException();
        }

        if(is_array($callback)){
            
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares()  as $middleware) {
                $middleware->execute();
            }
            
        }
       
        return  call_user_func($callback , $this->request);
       
    }
}
