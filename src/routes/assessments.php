<?php
use Slim\App;
use App\Controllers\AssessmentsController;

return function (App $app) {
    $app->get('/api/assessments', AssessmentsController::class . ':getAll');
    $app->get('/api/assessments/{id}', AssessmentsController::class . ':get');
    $app->post('/api/assessments', AssessmentsController::class . ':create');
    $app->put('/api/assessments/{id}', AssessmentsController::class . ':update');
    $app->delete('/api/assessments/{id}', AssessmentsController::class . ':delete');
};
