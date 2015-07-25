<?php
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 25.07.15
 * Time: 16:26
 */
require_once __DIR__.'/../vendor/autoload.php';

\BB\Core::init();

use QuimCalpe\Router\Router;
use QuimCalpe\Router\SimpleDispatcher;

// Create Router instance
$router = new Router();

// Define routes
$router->addRoute('GET', '/', 'BB\Controllers\Home::index');

try {
    // Match routes
    $route = $router->parse($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    // Dispatch route
    $dispatcher = new SimpleDispatcher;
    $response = $dispatcher->handle($route);
} catch (QuimCalpe\Router\MethodNotAllowedException $e) {
    header('HTTP/1.0 405 Method Not Allowed');
    // exception message contains allowed methods
    header('Allow: '.$e->getMessage());
} catch (QuimCalpe\Router\RouteNotFoundException $e) {
    header('HTTP/1.0 404 Not Found');
    // not found....
}

