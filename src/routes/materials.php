<?php
use Slim\App;
use App\Controllers\MaterialsController;

return function (App $app) {
    $app->get('/api/materials', MaterialsController::class . ':getAll');
    $app->get('/api/materials/{id}', MaterialsController::class . ':get');
    $app->post('/api/materials', MaterialsController::class . ':create');
    $app->put('/api/materials/{id}', MaterialsController::class . ':update');
    $app->delete('/api/materials/{id}', MaterialsController::class . ':delete');
};
