<?php

namespace app\core;


use app\exceptions\Handler;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Handler $handler;
    public Database $db;
    public static Application $app;
    public static string $DIR_ROOT;
    public function __construct(string $rootPath, array $config)
    {
        self::$DIR_ROOT = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
        self::$app = $this;
        $this->handler = new Handler();
        $this->db = new Database($config['db']);
    }

    public function run()
    {

        try {

            echo $this->router->resolve();

        } catch (FrameworkException $e) {
            echo  $this->handler->handle($e);
        }
    }
}
