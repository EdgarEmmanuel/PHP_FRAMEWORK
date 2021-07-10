<?php

namespace App\Controllers;



class ErrorController extends BaseController {


    public function error(){
        return $this->view("error");
    }

}