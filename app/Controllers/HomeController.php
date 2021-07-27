<?php

namespace App\Controllers;


class HomeController extends BaseController {

    

    public function home(){
        return $this->view("Home");
    }

    public function show(){

    }

}