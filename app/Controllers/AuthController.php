<?php

namespace App\Controllers;


class AuthController extends BaseController {

    public function home(){
        echo $this->templates->render("auth/home");
    }


    public function login(){
        var_dump($this->request->getParsedBody());
        // die;
        //var_dump($body);
        die;
    }

}