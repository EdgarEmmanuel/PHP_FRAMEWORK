<?php

namespace Framework\Routes;


use GuzzleHttp\Psr7\Response as ResponseGuzzle;
use Psr\Http\Message\ResponseInterface;
/*
 * An helper for the router
 */
trait TraitRouteHelper{

    /**
     * return a redirection response
     *
     * @param string $route
     * @param array $params
     * @return ResponseInterface
     */
    public function redirect(string $route, array $params = []): ResponseInterface
    {
        $redirectUri = $this->router->generateURI($route, $params);
        return (new ResponseGuzzle())
            ->withStatus(301)
            ->withHeader('location', $redirectUri);
    }

}
