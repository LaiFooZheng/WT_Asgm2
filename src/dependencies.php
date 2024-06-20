<?php
use DI\Container;
use Psr\Container\ContainerInterface;
use Slim\Middleware\ErrorMiddleware;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Interfaces\RouteCollectorInterface;
use Slim\Interfaces\RouteResolverInterface;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\Views\Twig;

// Add to Container
return function (Container $container) {
    $container->set('db', function () {
        $db = new PDO('mysql:host=localhost;dbname=wt_asgm2;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    });

    $container->set('view', function () {
        return Twig::create('../templates', ['cache' => false]);
    });

    $container->set(CallableResolverInterface::class, function (ContainerInterface $container) {
        return new Slim\CallableResolver($container);
    });

    $container->set(RouteCollectorInterface::class, function (ContainerInterface $container) {
        return $container->get(Slim\Routing\RouteCollector::class);
    });

    $container->set(RouteResolverInterface::class, function (ContainerInterface $container) {
        return $container->get(Slim\Routing\RouteResolver::class);
    });

    $container->set(Psr\Http\Message\ResponseFactoryInterface::class, function (ContainerInterface $container) {
        return $container->get(Slim\Psr7\Factory\ResponseFactory::class);
    });

    $container->set(ErrorMiddleware::class, function (ContainerInterface $container) {
        $callableResolver = $container->get(CallableResolverInterface::class);
        $responseFactory = $container->get(Psr\Http\Message\ResponseFactoryInterface::class);
        return new ErrorMiddleware($callableResolver, $responseFactory, true, true, true);
    });
};

