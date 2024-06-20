<?php
require __DIR__ . '/../vendor/autoload.php';

use DI\Container;
use Slim\Factory\AppFactory;

// Create Container using PHP-DI
$container = new Container();
AppFactory::setContainer($container);

// Create App
$app = AppFactory::create();

// Register middleware
(require __DIR__ . '/../src/middleware.php')($app);

// Register dependencies
(require __DIR__ . '/../src/dependencies.php')($container);

// Register routes
(require __DIR__ . '/../src/routes/users.php')($app);
(require __DIR__ . '/../src/routes/materials.php')($app);
(require __DIR__ . '/../src/routes/assessments.php')($app);

// Run app
$app->run();
