<?php

namespace App\Controllers;
use League\Plates\Engine;
use League\Plates\Extension\Asset;
use League\Plates\Extension\ExtensionInterface;

class BaseController{

    /**
     * Plate template engine
     * http://platesphp.com/getting-started/simple-example/
     */

    protected $templates;

    public function __construct(){
        
        $this->templates = new Engine(SRC_VIEWS."/templates");
        $this->templates->loadExtension(new Asset(SRC_ASSETS));
    }
}