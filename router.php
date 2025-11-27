<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/'     => 'controllers/IndexController.php',
    '/fact' => 'controllers/FactController.php',
    '/fact-view' => 'controllers/FactViewController.php',
];


if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);

    require('views/404.php');

    die();
}
