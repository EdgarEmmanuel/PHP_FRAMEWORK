<?php

namespace App\Routes;

use App\Controllers\{HomeController,ErrorController};
use App\Config\Exception\ClassNotFoundException;


class Router {

    private $controllerNamespace = "App\\Controllers\\";

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
        $httpRequestHandler = new HttpRequestHandler();
        
        $httpMethod = $httpRequestHandler->getHttpRequestMethod();
        $uri = $httpRequestHandler->getHttpRequestPath();

        $routeInformations = Routes::routes()->dispatch($httpMethod, $uri);

        $this->verifyRoutesIntegrity($routeInformations);
        
    }


    public function verifyRoutesIntegrity($routeInformations){

        switch ($routeInformations[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->RouteNotFound($routeInformations);
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->RouteWithMethodNotAllowed($routeInformations);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $this->routeFound($routeInformations);
                break;
        }

    }

    

    public function resolveGetRoutes ($val=null) {
        if($val!=null){
            $numberOfParameter = $this->get_length();
            
            if($numberOfParameter==1 || $numberOfParameter==0){
                $parameters_arguments = explode("@",$val["page"]);
                $FIRST_POSITION = 0;
                $SECOND_POSITION = 1;

                if(count($parameters_arguments)==2){
                    $controllerName = $parameters_arguments[$FIRST_POSITION];
                    $controllerFullPath = "App\\Controllers\\".$controllerName;
                    $functionName = $parameters_arguments[$SECOND_POSITION];

                    if(file_exists(SRC_CONTROLLERS."/".$controllerName)){
                        try{
                            $constrollerInstance = new $controllerFullPath();
                            return $constrollerInstance->{$functionName}();
                        }catch(\Exception $e){
                            throw new \Exception("erreur");
                        }
                    } else {
                        $error = new ErrorController();
                        return $error->error();
                    }
                }else{
                    var_dump("erreur controller {$parameters_arguments[$FIRST_POSITION]} inexistant");
                }
            } else {
                var_dump($val);
            }
        }else {
            $defaultController = new HomeController();
            return $defaultController->home();
        }             
    }

    public function get_length(){
        return count($_GET);
    }


    public function RouteNotFound($routeInformations){
        var_dump($routeInformations);
    }

    public function RouteWithMethodNotAllowed($routeInformations){
        $allowedMethods = $routeInformations[1];
        var_dump($allowedMethods);
    }

    public function RouteFound($routeInformations){
        $handlerInformations = $routeInformations[1];
        $routeVariables = $routeInformations[2];

        $parameters_arguments = explode("@",$handlerInformations);

        $controllerName = $parameters_arguments[0];
        $controllerFullPath = $this->controllerNamespace.$controllerName;
        $functionName = $parameters_arguments[1];

        try{
            if(class_exists($controllerFullPath)){
                try{
                    $controllerInstance = new $controllerFullPath();
                    if(! method_exists($controllerInstance,$functionName)) throw new ClassNotFoundException();
                    return $controllerInstance->{$functionName}();
                }catch(ClassNotFoundException $error){
                    return $error->showErrorMethod($functionName);
                }
            } else {
                throw new ClassNotFoundException();
            }
        } catch (ClassNotFoundException $error){
            return $error->showErrorController($controllerName);
        }
    }

}