<?php

use DI\Container;
use FastRoute\Dispatcher;

require_once 'vendor/autoload.php'; // Include autoloader

$routeVars = function ($routeInfo) { return $routeInfo = [2];};

// Create DI container
$app = new Container();

// Include database configuration
require_once __DIR__ . '/bootstrap/db.php';

// Include models and repositories
require_once __DIR__ . '/bootstrap/repositories.php';
require_once __DIR__ . '/bootstrap/models.php';

// Load routes
$dispatcher = FastRoute\simpleDispatcher(require_once __DIR__ . '/bootstrap/routes.php');

// Fetch method and URI from the request
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (($pos = strpos($uri, '?')) !== false) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
// Handle routing results
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo json_encode(['error' => '404 Not Found']);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo json_encode(['error' => '405 Method Not Allowed']);
        break;
    case Dispatcher::FOUND:
        list($controllerName, $method) = $routeInfo[1];
//        $vars = call_user_func_array($routeVars, array_values($routeInfo[2]));
        $vars = $routeInfo[2];

        // Convert namespace separators to directory separators
        $convertedControllerName = str_replace('\\', '/', $controllerName);
        // Require the controller file
        require_once __DIR__ . '/src/' . $convertedControllerName . '.php';

        // Create instance of the controller and call the method
        $controllerInstance = new $controllerName($app);
        $response = call_user_func_array([$controllerInstance, $method], $vars);

        // Set Content-Type header to indicate JSON response
        header('Content-Type: application/json');

        // Output the response as JSON
        echo json_encode($response);
        break;
}
