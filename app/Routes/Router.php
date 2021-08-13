<?php

namespace App\Routes;

use App\Controllers\{HomeController,ErrorController};
use App\Config\Container\Container;


class Router {

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

        $routeInformations = RoutesFactory::routes()->dispatch($httpMethod, $uri);

        $this->verifyRoutesIntegrity($routeInformations);
        
    }


    public function verifyRoutesIntegrity($routeInformations){

        switch ($routeInformations[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->RouteNotFound();
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->RouteWithMethodNotAllowed($routeInformations);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $this->routeFound($routeInformations);
                break;
        }

    }


    public function RouteNotFound(){
        $notFoundUrl =  $this->httpRequestHandler->getHttpRequestPath();
        $this->errorController->functionPageNotFound($notFoundUrl);
    }

    public function RouteWithMethodNotAllowed($routeInformations){
        $allowedMethods = $routeInformations[1];
        echo "Alowed method error in the Router.php file ";
        var_dump($allowedMethods);
    }

    public function RouteFound($routeInformations){
        $this->isTheCallableExists($routeInformations);
        $this->whenTheHandlerIsArray($routeInformations);
    }


    private function whenTheHandlerIsArray($routeInformations) {
        $handlerInformations = $routeInformations[1];
        $routeVariables = $routeInformations[2];
        $this->container->call($handlerInformations,$routeVariables);
    }

    private function isTheCallableExists($routeInformations){
        $theCallableController = $routeInformations[1][0];
        $theCallableFunction = $routeInformations[1][1];
        var_dump(class_exists($theCallableController));
        var_dump(method_exists($theCallableController,$theCallableFunction));
        die;
    }

}