<?php

namespace App\Controllers;


class ErrorController extends BaseController {

    public function functionPageNotFound($url){
        echo $this->templates->render("pages/error",["url" => $url]);
    }
}