<?php

// This is the bootstrap file and the entry point for all requests.
// Your Nginx configuration should point all requests to this file.

// Load Composer's autoloader. This is crucial for including all
// required libraries and our own application classes.
require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

// 1. Create the Request Context
// The RequestContext contains information about the current request,
// such as the URL, host, and HTTP method.
$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

// 2. Define the Routes
// Here, we define all the routes for our application. Each route
// is linked to a specific controller and action.
$routes = new RouteCollection();

// The home page route.
// 'name' => 'home_page'
// 'path' => '/'
// 'defaults' => ['_controller' => 'HomeController::index']
$routes->add('home_page', new Route('/', [
    '_controller' => 'App\\Controller\\HomeController::index'
]));

// The test page route.
$routes->add('test_page', new Route('/test', [
    '_controller' => 'App\\Controller\\TestController::index'
]));
// Add more routes here as your application grows, for example:
// $routes->add('about_page', new Route('/about', ['_controller' => 'App\\Controller\\AboutController::index']));

// 3. Match the Request
// The UrlMatcher attempts to match the current request's URL against
// the defined routes.
$matcher = new UrlMatcher($routes, $context);

try {
    // Attempt to find a matching route based on the request URI.
    $parameters = $matcher->match($context->getPathInfo());

    // Extract the controller class and method name from the route parameters.
    // E.g., 'App\\Controller\\HomeController' and 'index'
    list($controllerClass, $method) = explode('::', $parameters['_controller']);

    // 4. Instantiate the Controller and Call the Action
    // Create an instance of the controller class.
    $controller = new $controllerClass();

    // Call the specified method on the controller instance.
    $response = $controller->$method($parameters);

    // 5. Send the Response
    // Display the output from the controller.
    echo $response;

} catch (ResourceNotFoundException $e) {
    // If no route matches, throw a 404 Not Found error.
    header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    echo "<p>The requested URL was not found on this server.</p>";
} catch (Exception $e) {
    // Handle other exceptions (e.g., internal server errors).
    header('HTTP/1.0 500 Internal Server Error');
    echo "<h1>500 Internal Server Error</h1>";
    echo "<p>An error occurred: " . $e->getMessage() . "</p>";
}
