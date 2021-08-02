<?php

namespace App\Routes;

use App\Controllers\{HomeController,ErrorController};
use App\Config\Exception\ClassNotFoundException;
use App\Config\Container\Container;


class Router {

    private $controllerNamespace = "App\\Controllers\\";
    private $httpRequestHandler;
    private $errorController ;

    public function __construct(Container $container){
        $this->container = $container->boot();
        $this->httpRequestHandler = new HttpRequestHandler();
        $this->errorController = new ErrorController();
    }

    public function get($path,$controllerAndMethod){
        $this->routes['get'][$path] = $controllerAndMethod;
    }

    public function formatUri($Url){
        if (false !== $pos = strpos($Url, '?')) {
            $Url = substr($Url, 0, $pos);
        }
        return $Url;
    }

    public function resolveRoutes($val=null){        
        $httpMethod =  $this->httpRequestHandler->getHttpRequestMethod();
        $uri =  $this->httpRequestHandler->getHttpRequestPath();

        $routeInformations = Routes::routes()->dispatch($httpMethod, $uri);

        $this->verifyRoutesIntegrity($routeInformations);
        
    }


    public function verifyRoutesIntegrity($routeInformations){

        switch ($routeInformations[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->RouteNotFound($this->httpRequestHandler->getHttpRequestPath());
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->RouteWithMethodNotAllowed($routeInformations);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $this->routeFound($routeInformations);
                break;
        }

    }

    public function get_length(){
        return count($_GET);
    }


    public function RouteNotFound($uri){
        $this->errorController->functionPageNotFound($uri);
    }

    public function RouteWithMethodNotAllowed($routeInformations){
        $allowedMethods = $routeInformations[1];
        var_dump($allowedMethods);
    }

    public function RouteFound($routeInformations){
        $this->whenTheHandlerIsArray($routeInformations);
    }


    public function whenTheHandlerIsArray($routeInformations) {
        $handlerInformations = $routeInformations[1];
        $routeVariables = $routeInformations[2];

        $this->container->call($handlerInformations,$routeVariables);
    }

}