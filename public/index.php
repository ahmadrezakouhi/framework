<?php

use Dotenv\Dotenv;

require_once __DIR__ .'/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


use app\core\Application;

$config=[
    'db'=>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$app = new Application(dirname(__DIR__),$config);


require_once __DIR__.'/../routes/api.php';



$app->run();