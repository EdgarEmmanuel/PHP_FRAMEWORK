<?php

namespace App\Controllers;
use League\Plates\Engine;

class BaseController {

    /**
     * Plate template engine
     * http://platesphp.com/getting-started/simple-example/
     */

    protected $templates;

    public function __construct(){
        $this->templates = new Engine(SRC_VIEWS."/templates");
    }
}