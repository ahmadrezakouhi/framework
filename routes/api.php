<?php
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\TaskController;
use app\controllers\UserController;

$app->router->post('/contact',[SiteController::class , 'handleContact']);
$app->router->post('/login',[AuthController::class,'login']);
//for every ones
$app->router->get('/users',[UserController::class , 'index']);
$app->router->post('/users',[UserController::class , 'store']);
$app->router->put('/users',[UserController::class,'update']);
$app->router->delete('/users',[UserController::class,'delete']);


$app->router->get('/tasks',[TaskController::class,'index']);
$app->router->post('/tasks',[TaskController::class,'store']);
$app->router->put('/tasks',[TaskController::class , 'update']);
$app->router->delete('/tasks',[TaskController::class,'delete']);
$app->router->post('/tasks/file',[TaskController::class ,'upload']);