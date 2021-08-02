<?php

namespace App\Controllers;


class HomeController extends BaseController {

    public function home(){
        echo $this->templates->render("welcome");
    }

    public function show($name){
        $view = $this->templates->render("index", ['name' => $name]);
        var_dump($view[0]);
    }

}