<?php

namespace App\config;
use App\Routes\Router;
use App\Config\Container\Container;

class App{
    
    public Router $router;
    public Container $container;

    public function __construct(){
        $this->container = new Container();
        $this->router = new Router($this->container);
    }

    public function run(){
        $this->router->resolveRoutes();
    }

}