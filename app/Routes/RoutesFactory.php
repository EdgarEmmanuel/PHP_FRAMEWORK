<?php


namespace App\Routes;

use function FastRoute\{simpleDispatcher};
use FastRoute\{RouteCollector};

class RoutesFactory {

    private static $routes = Web::ROUTES;

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