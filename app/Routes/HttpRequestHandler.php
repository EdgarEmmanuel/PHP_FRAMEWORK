<?php

namespace App\Routes;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\ServerRequest;

class HttpRequestHandler{

    private $request ;

    /**
     * https://docs.laminas.dev/laminas-diactoros/v2/usage/
     */


    public function __construct(){
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
    }

    public function getHttpRequestPath(){
        $uri = $this->request->getServerParams()["REQUEST_URI"];
        if($uri == WEBROOT || $uri == WEBROOT."index.php"){
            $uri = "/";
        } else {
            if(isset($_GET["page"])){
                $uri = $_GET["page"];
            } else {
                $uri = "/error";
            }
        }
        return $uri;
    }

    public function getInstance(){
        return $this->request->getServerParams();
    }

    public function getHttpRequestMethod(){
        return $this->request->getServerParams()["REQUEST_METHOD"];
    }

    public function getHttpRequestBody(){
        return $this->request->getServerParams()["REQUEST_URI"];
    }

}