<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/'            => 'controllers/facts/index.php',
    '/fact'        => 'controllers/facts/show.php',
    '/fact-create' => 'controllers/facts/create.php',
    '/fact-delete' => 'controllers/facts/delete.php',
    '/fact-edit'   => 'controllers/facts/edit.php',
    '/fact-update' => 'controllers/facts/put.php',
];


if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);

    require('views/404.php');

    die();
}
