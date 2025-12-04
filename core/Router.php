<?php

class Router
{
    protected $routes = [];
    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }
    public function post() {}
    public function delete() {}
    public function put() {}
}
