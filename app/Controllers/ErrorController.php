<?php

namespace App\Controllers;


class ErrorController extends BaseController {

    public function functionPageNotFound($notFoundUrl){
        echo $this->templates->render("pages/error",["url" => $notFoundUrl]);
    }
}