<?php

namespace Framework\Routes;


use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use \Zend\Expressive\Router\Route as ZendRoute;

class Router
{


    private $router;


    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }

    /**
     * @param  string   $path
     * @param  callable $function
     * @param  string   $routeName
     * @return void
     */
    public function get(string $path, callable $function, string $routeName)
    {
        $this->router->addRoute(new ZendRoute($path, $function, ['GET'], $routeName));
    }

    /**
     * @param  ServerRequestInterface $request
     * @return Route
     */
    public function match(ServerRequestInterface $request): ?Route
    {
        $resultRoute = $this->router->match($request);
        if(!$resultRoute->isFailure()) {
            return new Route(
                $resultRoute->getMatchedRouteName(),
                $resultRoute->getMatchedMiddleware(),
                $resultRoute->getMatchedParams()
            );
        }
        return null;
    }

    /**
     * @param  string $routeName
     * @param  array  $parameters
     * @return string
     */
    public function generateURI(string $routeName, array $parameters): string
    {
        return $this->router->generateUri($routeName, $parameters);
    }

}