<?php

namespace App\Controllers;
use League\Plates\Engine;
use League\Plates\Extension\Asset;
use League\Plates\Extension\ExtensionInterface;
use Laminas\Diactoros\ServerRequestFactory;

class BaseController{

    /**
     * Plate template engine
     * http://platesphp.com/getting-started/simple-example/
     */
    protected $templates;
    

    /**
     * https://docs.laminas.dev/laminas-diactoros/v2/usage/
     */
    protected $request;


    public function __construct() {
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
        
        $this->templates = new Engine(SRC_VIEWS."templates");
        $this->templates->loadExtension(new Asset(SRC_ASSETS));
    }

}