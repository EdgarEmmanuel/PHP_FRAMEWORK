<?php

namespace App\Controllers;


class ErrorController extends BaseController {

    public function PageNotFound($notFoundUrl){
        $text = "URL <b> <?=$this->e($notFoundUrl)?> </b> Not Found.<br/>
        See the Route Declaration file ";
        $this->renderTheTemplate($text);
    }

    public function controllerOrMethodNotFound($controllerNotFounded, $isTheMethod = false ){
        $text = $isTheMethod ? "Function" : "Controller ";
        $message = "The {$text} <b> $controllerNotFounded </b> Not Found";
        $this->renderTheTemplate($message);
    }


    private function renderTheTemplate($message){
        echo $this->templates->render("pages/error",["message" => $message]);
    }
}