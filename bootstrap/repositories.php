<?php

use DI\Container;
use repository\PostRepository;
use repository\MovieRepository;

// Include all PHP files in the repository directory
foreach (glob(__DIR__ . '/../src/repository/*.php') as $filename) {
    require_once $filename;
}


// Create a new DI container instance
//$app = new Container();

require  __DIR__."/redis.php";
// Define the 'repository.post' service
//$app->set('repository.post', function (Container $app) {
//    return new PostRepository($app->get('database'));
//});

$app->set('repository.movie', function (Container $container) {
    return new MovieRepository($container->get('cache.movie'));
});



// Return the DI container
return $app;
