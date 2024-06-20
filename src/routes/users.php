<?php
use Slim\App;
use App\Controllers\UsersController;

return function (App $app) {
    $app->get('/api/users', UsersController::class . ':getAll');
    $app->get('/api/users/{id}', UsersController::class . ':get');
    $app->post('/api/users', UsersController::class . ':create');
    $app->put('/api/users/{id}', UsersController::class . ':update');
    $app->delete('/api/users/{id}', UsersController::class . ':delete');
    $app->post('/api/login', UsersController::class . ':login');
    $app->post('/api/register', UsersController::class . ':register');
};
