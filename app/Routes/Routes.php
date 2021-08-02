<?php


namespace App\Routes;

use function FastRoute\{simpleDispatcher};
use FastRoute\{RouteCollector};

class Routes {

    private static $routes = [
        ["GET","/",['App\Controllers\HomeController', 'home']],
        ['GET', '/articles/{name}/{id}', ['App\Controllers\HomeController', 'show']]
    ];

    public static function routes (){
        $dispatcher = simpleDispatcher(function(RouteCollector $r) {
            foreach(self::$routes as $route){
                $r -> addRoute(
                    $route[0],
                    $route[1],
                    $route[2]
                );
            }
        });
        return $dispatcher;
    }

}