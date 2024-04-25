<?php

use DI\Container;
use Model\PostModel;
use Model\MovieModel;


// Include all PHP files in the model and repository directories
foreach (glob(__DIR__ . '/../src/model/*.php') as $filename) {
    require_once $filename;
}

// Create a new DI container instance
//$app = new Container();

// Define the 'model.post'
//$app->set('model.post', function ($app) {
//    return new PostModel($app->get('repository.post'));
//});


$app->set('model.movie', function (Container $container) {
    return new MovieModel($container->get('repository.movie'));
});


// Return the DI container
return $app;
