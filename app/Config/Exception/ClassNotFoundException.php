<?php

namespace App\Config\Exception;
use App\Controllers\{ErrorController};

class ClassNotFoundException extends \Exception{
    private $errorController ;


    public function __construct(){
        $this->errorController = new ErrorController();
    }

    public function showErrorMethod($functionName){
        return $this->errorController->error();
    }

    public function showErrorController($nameController){
        return $this->errorController->error();
    }
}