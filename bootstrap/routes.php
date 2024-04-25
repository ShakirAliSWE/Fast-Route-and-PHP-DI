<?php

use FastRoute\RouteCollector;

return function(RouteCollector $router) {
    // Define routes
    $router->addRoute('POST', '/api/post', ['controller\PostController', 'createPostAction']);
    $router->addRoute('GET', '/api/post/{id}', ['controller\PostController', 'getPostAction']);

    // Add more routes as needed

    $router->addRoute('GET', '/api/v1/movies', ['controller\MovieController', 'getMoviesAction']);
    $router->addRoute('GET', '/api/v1/movies/{id}', ['controller\MovieController', 'getMovieAction']);
    $router->addRoute('POST', '/api/v1/movies', ['controller\MovieController', 'createMovieAction']);
};