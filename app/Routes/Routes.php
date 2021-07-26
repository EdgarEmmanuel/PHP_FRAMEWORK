<?php


namespace App\Routes;

use function FastRoute\{simpleDispatcher};
use FastRoute\{RouteCollector};

class Routes {

    private static $routes = [
        ["method" => "GET","url" => "/","controllerHandler" => "HomeController@home"],
        ["GET","/user/{id:\d+}","get_user_handler"],
        ['GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler']
    ];

    public static function routes (){
        $dispatcher = simpleDispatcher(function(RouteCollector $r) {
            foreach(self::$routes as $route){
                $r -> addRoute(
                    $route["method"] ?? $route[0],
                    $route["url"] ?? $route[1],
                    $route["controllerHandler"] ?? $route[2]
                );
            }
        });
        return $dispatcher;
    }

}