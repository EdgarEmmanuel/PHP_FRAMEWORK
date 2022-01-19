<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App{


    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();

        if(!empty($uri) && $uri[-1] == "/"){
            $response = (new Response())
                ->withStatus(301);
            return $response;
        }

        $response = new Response();
        $response = $response->getBody()->write('hello');

        return $response;
    }

}